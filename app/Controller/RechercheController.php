<?php 

namespace Controller;

use \W\Controller\Controller;
use Controller\CocktailsController;
use Model\Cocktails\CocktailsModel;


class RechercheController extends Controller
{

	private $_alcools 			= array();
	private $_urlpartalcool;
	private $_urlpartjuice;
	private $_urlpart;
	private $_cocktaillist 		= array();
	private $_error;
	private $postId;

public function searchformhome()
	{
		$cocktailcontroller = new CocktailsController();
		$_form = $cocktailcontroller->createform();
		
		$api = new CocktailsModel;

		if(!$_GET) {$this->redirectToRoute('cocktails_showcocktails');}

		if ($_GET) {
			
			/**************** Construction de l'url pour la requête des alcools ******************/

			if (!empty($_GET['alcool']) && !empty($_GET['juice'])) {
				
				$_alcools = $_GET['alcool'];
				$_valuesalcool = 'withtype/' . implode('/and/', $_alcools);				
				$_juices = $_GET['juice'];
				$_valuesjuice = 'with/' . implode('/and/', $_juices);
				
				$_cocktaillist = $api->getcocktaillist($_urlpart);


			}
			
			if (!empty($_GET['alcool']) && empty($_GET['juice'])) {

				$_alcools = $_GET['alcool'];
				$_urlpartalcool = 'withtype/' . implode('/and/', $_alcools);				
				$_urlpart = $_urlpartalcool;
			}
			
			if (empty($_GET['alcool']) && !empty($_GET['juice'])) {

				$_juices = $_GET['juice'];
				$_urlpartjuice = 'with/' . implode('/and/', $_juices);
				$_urlpart = $_urlpartjuice;
			}
			

			$api = new CocktailsModel;
			$_cocktaillist = $api->getcocktaillist($_urlpart);
		
		}
		
		if (!empty($_cocktaillist)) {
			$this->show('cocktail/recherche', ['cocktaillist' => $_cocktaillist, 'error' => '', 'form' => $_form]);
		}
		else {
			$_error = '<h3 class="center-align">Oups, aucune recette ne correspond à votre recherche !</h3>';
			$this->show('cocktail/recherche', ['error' => $_error, 'form' => $_form]);
		}	
	}



































} // Fin de classe