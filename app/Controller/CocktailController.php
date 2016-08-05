<?php

namespace Controller;

use \W\Controller\Controller;

class CocktailController extends Controller
{
	
	private $_alcools = array();
	private $_urlpart = '';
	private $_jsonurl;
	private $_json;
	private $_data;
	private $_cocktail;
	private $_cocktailcard = array();
	private $_cocktaillist = array();

	public function getformindex()
	{
		

		if (isset($_POST['submit'])) {
			
			$_alcools = $_POST['alcool'];
			

			/**************** Construction de l'url ******************/
			foreach ($_alcools as $alcool) 
			{
				$_urlpart .= "withtype/" . $alcool . "/"; 
			}
				// echo $_urlpart;
			
			/**************** Récupération des données ******************/
			$_jsonurl = 'https://addb.absolutdrinks.com/drinks/' . $_urlpart . '?apiKey=2c758736e5f844bdb9d39308df889c6d';
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
									'imgurlmodal' 	=> "http://assets.absolutdrinks.com/drinks/transparent-background-white/soft-shadow/floor-reflection/300x400/" . $_cocktail->id . ".png",

				);
			
				$_cocktaillist[] = $_cocktailcard;
			}

		}

		$this->show('cocktail/cocktail', ['cocktaillist' => $_cocktaillist]);
	}
}
