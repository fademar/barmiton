<?php

namespace Model\Cocktails;

use Model\Occasions\OccasionsModel;
use Model\Couleurs\CouleursModel;
use Model\Difficultes\DifficultesModel;
use Model\Gouts\GoutsModel;
use Model\Traductions\TraductionsModel;
use Model\Recettes\RecettesModel;

class CocktailsModel extends \W\Model\Model 
{
	
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $_cocktailapi;
	private $_cocktaildb;
	private $_commentairedb;

	private $_cocktailcard = array();
	private $_cocktaillist = array();
	private $_selection; 
	private $_cocktailselection = array();
	private $_arraykey = array();
	private $_listenoms = array();
	private $_cocktailnote;
	private $_bestcocktail;
	private $_compteurnote = array();



	/************************ Construction de l'url pour l'API *****************************/

	public function constructUrl($urlpart) {

		if ($urlpart === 'all') {
			$_jsonurl		= 'https://addb.absolutdrinks.com/drinks/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		}
		else 
		{
			$_jsonurl		= 'https://addb.absolutdrinks.com/drinks'. $urlpart .'/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		}

		return $_jsonurl;
	}


	/************************ Récupération du json *****************************/

	public function getCocktailListBy($jsonurl)
	{
		
			$_json 			= file_get_contents($jsonurl);

			$_list			= json_decode($_json)->result;
			$_totalresult 	= json_decode($_json)->totalResult;

			$_data 			= ["list" => $_list, 'totalresult' => $_totalresult];
			
			return $_data;

	} //fin de function getcocktaillist




	/************************ Transformation du json et récupération des données en bdd *****************************/


	public function fetchData($data)
	{

		if (!empty($data)) {

			/**************** Enregistrement des données dans un tableau associatif ******************/
			foreach ($data['list'] as $_cocktail) {

				// var_dump($_cocktail);

				$_occasionsfr 	= array();
				$_difficultefr 	= '';
				$_couleurfr		= '';
				$_valueskill 	= $_cocktail->skill->value;

				$this->setTable('cocktails');
				$_cocktaildb = $this->search(['idCocktailApi' => $_cocktail->id]);

				if (empty($_cocktaildb)) { 
					$_note = 0; 
				} else { 
					$_note = $_cocktaildb[0]['note'];
				}


				$occasionstab = array();
				$goutstab = array();
			
				$occasionsdb = new OccasionsModel();
			
				foreach ($_cocktail->occasions as $key => $occasion) {		
					$occasionsdata = $occasionsdb->search(['champuk' => $occasion->id]);				
					switch ($occasionsdata[0]['champfr']) {
						case "après-midi":
							$occasionfr = 'l\'après-midi';
							break;
						case "apéritif":
							$occasionfr = 'l\'apéritif';
							break;
						case "digestif":
							$occasionfr = 'le digestif';
							break;
						case "soirée":
							$occasionfr = 'la soirée';
							break;
					}

					$occasionstab[] = $occasionfr;

				}

				$_occasionstext = implode(', ', $occasionstab);

				$goutsdb = new GoutsModel();

				foreach ($_cocktail->tastes as $key => $gout) {
					$goutsdata = $goutsdb->search(['champuk' => $gout->id]);
					$goutstab[] = $goutsdata[0]['champfr'];
				}
			
				$_goutstext = implode(', ', $goutstab);


				$difficultesmodel = new DifficultesModel();

				$_difficultedb = $difficultesmodel->search(['champuk' => $_cocktail->skill->id]);
				
				$_difficultefr = $_difficultedb[0]['champfr'];


				$couleursmodel = new CouleursModel();

				$_couleurdb = $couleursmodel->search(['champuk' => $_cocktail->color]);

				$_couleurfr = $_couleurdb[0]['champfr'];
					

				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'valueskill'	=> $_valueskill,
									'skill'			=> $_difficultefr,
									'occasions' 	=> $_occasionstext,
									'couleur'		=> $_couleurfr,
									'note'			=> $_note,
									'gouts'			=> $_goutstext,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg"

								);
			
				$_cocktaillist[] = $_cocktailcard;

			} // Fin de foreach()	
			
		}
		else {
			$_cocktaillist = '';
		}


		return $_cocktaillist;

	} //fin de function fetchdata



	public function recordCocktail($data, $urlpart) {

		$this->setTable('cocktails');
		$this->setPrimaryKey('id');

			
		$traduction = new TraductionsModel();

		$descriptiontraduite = $traduction->getTrad($data->descriptionPlain);			

		$datafr = array(
				'idCocktailApi' => $urlpart,
				'nomCocktail' 	=> $data->name,
				'description'	=> $descriptiontraduite,
				'note'			=> 0,
				'compteurnote'	=> 0,
				'langue' 		=> 'en'
				);

		$this->insert($datafr);

	}


	
	public function getcocktaildata($urlpart)
	{

		$this->setTable('cocktails');

		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;
	    

		$_cocktailapi 	= $_data[0];
		$_ingredientapi = $_cocktailapi->ingredients;
	

		$_cocktaildb = $this->search(['idCocktailApi' => $urlpart]);

		if (empty($_cocktaildb)) {

			$this->recordCocktail($_cocktailapi, $urlpart);
			$_cocktaildb = $this->search(['idCocktailApi' => $urlpart]);
		} 


		$this->setTable('ingredients');


		foreach ($_ingredientapi as $value) {

			$idIngredient = $value->id;
			
			$recupDose = $value->textPlain;			
			$dose = substr($recupDose, 0, 1);
			$int = (int)$dose;
			
			$ingredientsDb = $this->search(['idIngredientsApi' => $idIngredient]);

			if (($idIngredient) === 'gin') {$ingredientsDb[0]['nomIngredient'] = 'Gin';}

			if ($dose > 1) {
				$phrase = $dose . ' doses de ' . $ingredientsDb[0]['nomIngredient'];
			}
			else if (!is_numeric($dose) && $idIngredient !== 'ice-cubes') {
				$phrase = '½ dose de ' . $ingredientsDb[0]['nomIngredient'];
			}
			else if ($idIngredient == 'ice-cubes') {
				$phrase = $ingredientsDb[0]['nomIngredient'];
			} 
			else {
				$phrase = $dose . ' dose de ' . $ingredientsDb[0]['nomIngredient'];
			}


			$tableauPhrase[] = $phrase;

		}


		$_cocktaildata = array(
							'id'			=> $_cocktailapi->id,
							'name' 			=> $_cocktailapi->name,
							'note' 			=> $_cocktaildb[0]['note'],
							'compteurnote' 	=> $_cocktaildb[0]['compteurnote'],
							'ingredients'	=> $tableauPhrase,
							'description'	=> $_cocktaildb[0]['description'],
							'occasions' 	=> $_cocktailapi->occasions,
							'taste' 		=> $_cocktailapi->tastes,
							'color' 		=> $_cocktailapi->color,
							'skill' 		=> $_cocktailapi->skill->name,
							'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktailapi->id . "(60).jpg",
							'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/500x700/" . $_cocktailapi->id . ".png",
							'video' 		=> $_cocktailapi->videos[0]->video,
							'langue'		=> $_cocktaildb[0]['langue']

		);
							

	
				
		return $_cocktaildata;
	

	} //fin de function getcocktaildata







	/************************ Récupération d'une sélection aléatoire de cocktails *****************************/
	
	public function getRandomCocktail($data, $n) {

		$_arraykey = array_rand($data, $n); // Je passe en paramètre les données Json et le nombre de cocktails à montrer
		
		foreach ($_arraykey as $datakey) {
			 	$_cocktail = $data[$datakey];			
	
				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'occasions' 	=> $_cocktail->occasions,
									'gouts'			=> $_cocktail->tastes,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",
								);
				
				$_cocktailselection[] = $_cocktailcard;
				
		} // Fin de foreach ($_arraykey as $datakey)

		return $_cocktailselection;

	} // Fin de fonction





	/************************ Récupération d'une sélection des cocktails les mieux notés *****************************/

	public function getBestCocktails() {
		
		$this->setTable('bestcocktail');

		$_listebest = $this->findAll();

		foreach ($_listebest as $_bestcocktail) {
			
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/'. $_bestcocktail['idCocktailApi'] .'?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			
			foreach ($_data as $_cocktail) {


				$_cocktailcard = array(
										'id'			=> $_cocktail->id,
										'name' 			=> $_cocktail->name,
										'occasions' 	=> $_cocktail->occasions,
										'gouts'			=> $_cocktail->tastes,
										'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",
									);
				
				$_cocktaillist[] = $_cocktailcard;
				
			}
			
		}

		return $_cocktaillist;

	} //fin de function getbestcocktail





	public function getCocktails() {

		$this->setTable('cocktails');
		$_noms = $this->findAll();

		return $_noms;
	}


	public function getIngredients($id)
	{
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $id . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		$_cocktailapi = $_data[0];

		$this->setTable('ingredients');
		$this->setPrimaryKey('idIngredientsApi');


		$_cocktaildb = $this->search(['idIngredientsApi' => $id]);
		

		$_cocktaildata = array(
							'id'			=> $_cocktailapi->id,
							'name' 			=> $_cocktailapi->name,
							'ingredients'	=> $_cocktaildb[0]['nomIngredient'],
							'description'	=> $_cocktailapi->description,
							'occasions' 	=> $_cocktailapi->occasions,
							'taste' 		=> $_cocktailapi->tastes,
							'color' 		=> $_cocktailapi->color,
							'skill' 		=> $_cocktailapi->skill->name,
							'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktailapi->id . "(60).jpg",
							'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktailapi->id . ".png"

		);
	

				
		return $_cocktaildata;

	} //fin de function getIngredients



	public function recupCommentaire($id)
	{
		/**************** Récupération des commentaires ******************/
		

		$this->setTable('commentaires');

		$_listecommentaire = $this->search(['iddrink' => $id]);

		return $_listecommentaire;


	}//fin de function recupCommentaire



} //Fin de classe