<?php 

namespace Controller;

use \W\Controller\Controller;
use Controller\CocktailsController;
use Model\Cocktails\CocktailsModel;


class RechercheController extends Controller
{

	private $_alcools 			= array();
	private $_urlpart;
	private $_data;
	private $_cocktaillist 		= array();
	private $_error;
	private $postId;
	private $_formcontroller;
	private $_form;


public function searchform()
	{
		$_formcontroller = new FormController();
		$_form = $_formcontroller->createSearchForm();
		
		$api = new CocktailsModel;

		if(!$_GET) {$this->redirectToRoute('cocktails_showcocktails');}

		if ($_GET) {
			
			$_urlpart = '';

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_GET['nomcocktail'])) {

				


			}

			if (!empty($_GET['alcoolsprincipaux'])) {

				$_alcools	= $_GET['alcoolsprincipaux'];
				$_urlpart	.= '/withtype/' . implode('/and/', $_alcools);				
			}
			
			if (!empty($_GET['alcools'])) {

				$_juices	= $_GET['alcools'];
				$_urlpart	.= '/with/' . implode('/and/', $_juices);
			}

			if (!empty($_GET['softs'])) {

				$_juices	= $_GET['softs'];
				$_urlpart	.= '/with/' . implode('/and/', $_juices);
			}

			if (!empty($_GET['épices'])) {

				$_juices	= $_GET['épices'];
				$_urlpart	.= '/with/' . implode('/and/', $_juices);
			}

			if (!empty($_GET['juice'])) {

				$_juices	= $_GET['juice'];
				$_urlpart	.= '/with/' . implode('/and/', $_juices);
			}
			
			if (!empty($_GET['couleurs'])) {

				$_couleurs	= $_GET['couleurs'];
				$_urlpart	.= '/colored/' . $_couleurs;
			}
			
			if (!empty($_GET['gouts'])) {

				$gouts	= $_GET['gouts'];
				$_urlpart	.= '/tasting/' . implode('/and/', $gouts);
			}

			if (!empty($_GET['difficultes'])) {

				$_difficultes	= $_GET['difficultes'];
				$_urlpart	.= '/skill/' . $_difficultes;
			}

			if (!empty($_GET['occasions'])) {

				$occasions	= $_GET['occasions'];
				$_urlpart	.= '/for/' . implode('/and/', $occasions);
			}


			$api = new CocktailsModel;
			$_data = $api->getCocktailListBy($_urlpart);

			$_cocktaillist = $api->fetchData($_data);
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