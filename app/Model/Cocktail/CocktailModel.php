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

	public function getcocktaillist($urlpart)
	{
		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $urlpart . '?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;

		/**************** Traitement des données ******************/
		foreach ($_data as $_cocktail) {

			// echo gettype($_cocktail);
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
								'imgurl' 		=> "http://assets.absolutdrinks.com/drinks/" . $_cocktail->id . ".png",
								'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/transparent-background-white/soft-shadow/floor-reflection/450x600/" . $_cocktail->id . ".png",

			);
		
			$_cocktaillist[] = $_cocktailcard;
		
		} // Fin de foreach()	
		
		return $_cocktaillist;

	} //fin de function getcocktaillist

} //Fin de classe