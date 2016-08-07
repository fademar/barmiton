<?php

namespace Model\Cocktail;

class CocktailModel extends \W\Model\Model 
{
	
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $urlpart;
	private $_cocktailcard = array();
	private $_cocktaillist = array();
	private $_selection; 
	private $_cocktailselection = array();
	private $_arraykey = array();



	public function getcocktaillist($urlpart)
	{
		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		
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
	
	public function getcocktailselection() {

		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;
		
		$_arraykey = array_rand($_data, 6); // Je sélection 6 clés aléatoires
			
		foreach ($_arraykey as $datakey) {
			 	$_cocktail = $_data[$datakey];			
	
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



} //Fin de classe