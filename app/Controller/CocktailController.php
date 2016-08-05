<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktail\CocktailModel;

class CocktailController extends Controller
{
	
	private $_alcools 		= array();
	private $_urlpart 		= '';
	private $_cocktaillist 	= array();
	private $_error 		= '';

	public function getformhome()
	{
		
		if (isset($_POST['submit']) && $_POST['submit'] === 'mixer') {
			
			$_alcools = $_POST['alcool'];
			

			/**************** Construction de l'url pour la requête auprès de l'API ******************/
			
			$_urlpart = 'withtype/' . implode('/withtype/', $_alcools);
						
			$api = new CocktailModel;
			$_cocktaillist = $api->getcocktaillist($_urlpart);
		
		}
		
		if (!empty($_cocktaillist)) {
			$this->show('cocktail/cocktail', ['cocktaillist' => $_cocktaillist]);
		}
		else {
			$_error = '<h3 class="center-align">Oups, nous n\'avons aucune recettes correspondant à votre recherche !</h3>';
			$this->show('cocktail/cocktail', ['error' => $_error]);
		}	
	}
}
