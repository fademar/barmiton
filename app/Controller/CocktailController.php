<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktail\CocktailModel;

class CocktailController extends Controller
{
	
	private $_alcools 		= array();
	private $_urlpartalcool;
	private $_urlpartjuice;
	private $_urlpart;
	private $_cocktaillist 	= array();
	private $_error;

	public function searchformhome()
	{
		
		if (isset($_POST['submit']) && $_POST['submit'] === 'mixer') {
			

			/**************** Construction de l'url pour la requête des alcools ******************/

			if (!empty($_POST['alcool']) && !empty($_POST['juice'])) {

				$_alcools = $_POST['alcool'];
				$_urlpartalcool = 'withtype/' . implode('/and/', $_alcools);				
				$_juices = $_POST['juice'];
				$_urlpartjuice = 'with/' . implode('/and/', $_juices);
				$_urlpart = $_urlpartalcool . '/' . $_urlpartjuice;
			}
			
			if (!empty($_POST['alcool']) && empty($_POST['juice'])) {

				$_alcools = $_POST['alcool'];
				$_urlpartalcool = 'withtype/' . implode('/and/', $_alcools);				
				$_urlpart = $_urlpartalcool;
			}
			
			if (empty($_POST['alcool']) && !empty($_POST['juice'])) {

				$_juices = $_POST['juice'];
				$_urlpartjuice = 'with/' . implode('/and/', $_juices);
				$_urlpart = $_urlpartjuice;
			}
			

			$api = new CocktailModel;
			$_cocktaillist = $api->getcocktaillist($_urlpart);
		
		}
		
		if (!empty($_cocktaillist)) {
			$this->show('cocktail/cocktail', ['cocktaillist' => $_cocktaillist, 'error' => '',]);
		}
		else {
			$_error = '<h3 class="center-align">Oups, aucune recette ne correspond à votre recherche !</h3>';
			$this->show('cocktail/cocktail', ['error' => $_error]);
		}	
	}
}
