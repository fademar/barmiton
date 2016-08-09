<?php

namespace Model\Cocktails;

class CocktailsModel extends \W\Model\Model 
{
	
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $_cocktailcard = array();
	private $_cocktaillist = array();
	private $_selection; 
	private $_cocktailselection = array();
	private $_arraykey = array();
	private $_listenoms = array();


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

				// echo gettype($_data);
				// echo "<pre>";
				// 	print_r($_cocktail);
				// echo "</pre>";
				// echo "<hr>";

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


	public function getCocktailListBy($param, $valeur)
	{
		
		if (($param === 'tout') && ($valeur === 'home')) {

			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			// var_dump($_data);

			$_selection 	= $this->getRandomCocktail($_data, 6);
			
			return $_selection;
		}

		if ($param === 'couleur') {

			$_jsonurl	= 'https://addb.absolutdrinks.com/drinks/colored/'. $valeur .'/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;
			// var_dump($_data);

			$_selection 	= $this->getRandomCocktail($_data, 4);
			
			return $_selection;
		}
		

		if ($param === 'occasion') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/for/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;

			$_selection = $this->getRandomCocktail($_data, 4);
			
			return $_selection;
		}

		if ($param === 'difficulte') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/skill/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;

			$_selection 	= $this->getRandomCocktail($_data, 4);
			
			return $_selection;
		}

		if ($param === 'gout') {
			$_jsonurl 	= 'https://addb.absolutdrinks.com/drinks/tasting/' . $valeur . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
			$_json 		= file_get_contents($_jsonurl);
			$_data 		= json_decode($_json)->result;

			$_selection 	= $this->getRandomCocktail($_data, 4);
			
			return $_selection;
		}

	} //fin de function getcocktaillist



	public function cocktailNote() {
		
	}




} //Fin de classe