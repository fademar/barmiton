<?php

namespace Model\Cocktails;

class CocktailsModel extends \W\Model\Model 
{
	
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $_cocktailapi;
	private $_cocktaildb;

	private $_cocktailcard = array();
	private $_cocktaillist = array();
	private $_selection; 
	private $_cocktailselection = array();
	private $_arraykey = array();
	private $_listenoms = array();
	private $_cocktailnote;
	private $_bestcocktail;
	private $_compteurnote = array();



	/************************ Récupération des données selon le type de cocktail recherché ($param) et la valeur de ce type ($urlpart) *****************************/


	public function getCocktailListBy($urlpart)
	{
		
		if ($urlpart === 'all') {
			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks/?pageSize=200&apiKey=2c758736e5f844bdb9d39308df889c6d';
		}
		else 
		{
			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks'. $urlpart .'/?pageSize=200&apiKey=2c758736e5f844bdb9d39308df889c6d';
		}
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			
			
			return $_data;

	} //fin de function getcocktaillist




	/************************ Transformation du json et récupération des données en bdd *****************************/


	public function fetchData($data)
	{
	
		if (!empty($data)) {

			/**************** Enregistrement des données dans un tableau associatif ******************/
			foreach ($data as $_cocktail) {

				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",

				);
			
				$_cocktaillist[] = $_cocktailcard;

			
			} // Fin de foreach()	
		}
		else {
			$_cocktaillist = '';
		}
				

		return $_cocktaillist;

	} //fin de function fetchdata





	
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

		if ($_cocktaildb == null) {


			$dataEn = array(
					'idCocktailApi' => $urlpart,
					'nomCocktail' 	=> $_cocktailapi->name,
					'description'	=> $_cocktailapi->descriptionPlain,
					'langue' 		=> $_cocktailapi->languageBranch
					);

			$this->insert($dataEn);

		} 


		$this->setTable('ingredients');


		foreach ($_ingredientapi as $value) {

			$idIngredient = $value->id;
			
			$recupDose = $value->textPlain;			
			$dose = substr($recupDose, 0, 1);
			$int = (int)$dose;
			

			$ingredientsDb = $this->search(['idIngredientsApi' => $idIngredient]);
			// var_dump($ingredientsDb);


			if ($dose > 1) {
				$phrase = $dose . ' doses de ' . $ingredientsDb[0]['nomIngredient'];
			}  elseif (!is_numeric($dose)) {
				$phrase = '½ dose de ' . $ingredientsDb[0]['nomIngredient'];
			}  else {
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
							'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktailapi->id . ".png",

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
			

			/**************** Traitement des données ******************/
			foreach ($_data as $_cocktail) {


				$_cocktailcard = array(
										'id'			=> $_cocktail->id,
										'name' 			=> $_cocktail->name,
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
		/**************** Récupération des données ******************/
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
							'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktailapi->id . ".png",

		);
	

				
		return $_cocktaildata;

	} //fin de function getIngredients






} //Fin de classe