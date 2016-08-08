<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktails\CocktailsModel;
use Model\Couleurs\CouleursModel;

class CocktailsController extends Controller
{
	
	private $_alcools 		= array();
	private $_urlpartalcool;
	private $_urlpartjuice;
	private $_urlpart;
	private $_cocktaillist 	= array();
	private $_error;
	private $_listeCouleurs;

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
			

			$api = new CocktailsModel;
			$_cocktaillist = $api->getcocktaillist($_urlpart);
		
		}
		
		if (!empty($_cocktaillist)) {
			$this->show('cocktail/cocktailliste', ['cocktaillist' => $_cocktaillist, 'error' => '',]);
		}
		else {
			$_error = '<h3 class="center-align">Oups, aucune recette ne correspond à votre recherche !</h3>';
			$this->show('cocktail/cocktailliste', ['error' => $_error]);
		}	
	}


	public function showcocktails() {
		$couleurdb = new CouleursModel();
		$_listeCouleurs = $couleurdb->getCouleurs();
		
		$this->show('cocktail/cocktail', ['listeCouleurs' => $_listeCouleurs]);
	}





















}
