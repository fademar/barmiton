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

	public function getformhome()
	{
		
		if (isset($_POST['submit']) && $_POST['submit'] === 'mixer') {
			

			/**************** Construction de l'url pour la requête des alcools ******************/

			if (!empty($_POST['alcool'])) {

				$_alcools = $_POST['alcool'];
				$_urlpartalcool = 'withtype/' . implode('/and/', $_alcools);				
				$_urlpartjuice = '';
			}
			
			/**************** Construction de l'url pour la requête des jus de fruits ******************/

			if (!empty($_POST['juice'])) {


				$_juices = $_POST['juice'];
				$_urlpartjuice = 'with/' . implode('/and/', $_juices);
				$_urlpartalcool .= '';
			}

			/**************** Construction de l'url complète pour la requête auprès de l'API ******************/
			
			$_urlpart = $_urlpartalcool . '/' . $_urlpartjuice;

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
