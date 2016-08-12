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
	private $_listeIngredient;

	public function getcocktaildata($urlpart)
	{
		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		$_cocktailapi 	= $_data[0];
		$_ingredientapi = $_cocktailapi->ingredients;

		$this->setTable('cocktails');
		$_cocktaildb = $this->search(['idCocktailApi' => $urlpart]);

		$this->setTable('ingredients');

		foreach ($_ingredientapi as $value) {

			// var_dump($value);

			$idIngredient = $value->id;
			
			$recupDose = $value->textPlain;			
			$dose = substr($recupDose, 0, 1);
			$int = (int)$dose;
			

			$ingredientsDb = $this->search(['idIngredientsApi' => $idIngredient]);
			// var_dump($ingredientsDb);


			if ($dose > 1) {
				$phrase = $dose . ' doses de ' . $ingredientsDb[0]['nomIngredient'];
			}  elseif (!is_numeric($dose)) {
				$phrase = $ingredientsDb[0]['nomIngredient'];
			}  else {
				$phrase = $dose . ' dose de ' . $ingredientsDb[0]['nomIngredient'];
			}


			$tableauPhrase[] = $phrase;

		}

		$_cocktaildata = array(
							'id'			=> $_cocktailapi->id,
							'name' 			=> $_cocktailapi->name,
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

	} //fin de function getcocktaillist





	/************************ Récupération des données selon l'url *****************************/


	public function getcocktaillist($urlpart)
	{
		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		
		// var_dump(search(['idCocktailApi', $_cocktail->id]));


		if (!empty($_data)) {

			/**************** Traitement des données ******************/
			foreach ($_data as $_cocktail) {

				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'ingredients'	=> $_cocktail->ingredients,
									'description'	=> $_cocktail->descriptionPlain,
									'occasions' 	=> $_cocktail->occasions,
									'taste' 		=> $_cocktail->tastes,
									'color' 		=> $_cocktail->color,
									'skill' 		=> $_cocktail->skill->name,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",
									'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktail->id . ".png",

				);
			
				$_cocktaillist[] = $_cocktailcard;

			
			} // Fin de foreach()	
		}
		else {
			$_cocktaillist = '';
		}
				

		return $_cocktaillist;

	} //fin de function getcocktaillist


	/************************ Récupération d'une sélection aléatoire de cocktails *****************************/
	
	public function getRandomCocktail($data, $n) {

		$_arraykey = array_rand($data, $n); // Je passe en paramètre les données Json et le nombre de cocktails à montrer
			
		foreach ($_arraykey as $datakey) {
			 	$_cocktail = $data[$datakey];			
	
				$_cocktailcard = array(
									'id'			=> $_cocktail->id,
									'name' 			=> $_cocktail->name,
									'ingredients'	=> $_cocktail->ingredients,
									'description'	=> $_cocktail->descriptionPlain,
									'occasions' 	=> $_cocktail->occasions,
									'taste' 		=> $_cocktail->tastes,
									'color' 		=> $_cocktail->color,
									'skill' 		=> $_cocktail->skill->name,
									'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/" . $_cocktail->id . "(60).jpg",
									'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktail->id . ".png",
								);
				
				$_cocktailselection[] = $_cocktailcard;
				
		} // Fin de foreach ($_arraykey as $datakey)

		return $_cocktailselection;

	} // Fin de fonction




	/************************ Récupération des données selon le type de cocktail recherché ($param) *****************************/


	public function getCocktailListBy($param, $valeur, $n)
	{
		
		if (($param === 'tout') && ($valeur === 'home')) {

			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			// var_dump($_data);

			$_selection 	= $this->getRandomCocktail($_data, $n);
			
			return $_selection;
		}

		if ($param === 'couleur') {

			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks/colored/'. $valeur .'/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			
			$_selection 	= $this->getRandomCocktail($_data, $n);
			
			return $_selection;
		}
		

		if ($param === 'occasion') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/for/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;

			$_selection = $this->getRandomCocktail($_data, $n);
			
			return $_selection;
		}

		if ($param === 'difficulte') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/skill/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;

			$_selection 	= $this->getRandomCocktail($_data, $n);
			
			return $_selection;
		}

		if ($param === 'gout') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/tasting/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;


			$_selection = $this->getRandomCocktail($_data, $n);
			
			return $_selection;
		}

	} //fin de function getcocktaillist

	

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
										'ingredients'	=> $_cocktail->ingredients,
										'description'	=> $_bestcocktail['description'],
										'occasions' 	=> $_cocktail->occasions,
										'taste' 		=> $_cocktail->tastes,
										'color' 		=> $_cocktail->color,
										'skill' 		=> $_cocktail->skill->name,
										'imgurlsmall' 	=> "http://assets.absolutdrinks.com/drinks/300x400/" . $_cocktail->id . "(60).jpg",
										'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/450x600/" . $_cocktail->id . ".png",
									);
				
				$_cocktaillist[] = $_cocktailcard;
				
			}
			
		}

		return $_cocktaillist;

	} //fin de function getbestcocktail


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