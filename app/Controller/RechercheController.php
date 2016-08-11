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

		if(!$_POST) {$this->redirectToRoute('cocktails_showcocktails');}

		if ($_POST) {
			
			$_urlpart = '';

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_POST['']))


			if (!empty($_POST['alcoolsprincipaux'])) {

				$_alcoolsprincipaux	 = $_POST['alcoolsprincipaux'];
				$_urlpart			.= '/withtype/' . implode('/and/', $_alcoolsprincipaux);				
			}
			
			if (!empty($_POST['alcools'])) {

				$_alcools	= $_POST['alcools'];
				$_urlpart	.= '/with/' . implode('/and/', $_alcools);
			}

			if (!empty($_POST['softs'])) {

				$_softs	= $_POST['softs'];
				$_urlpart	.= '/with/' . implode('/and/', $_softs);
			}

			if (!empty($_POST['épices'])) {

				$_epices	= $_POST['épices'];
				$_urlpart	.= '/with/' . implode('/and/', $_epices);
			}

			if (!empty($_POST['juice'])) {

				$_juices	= $_POST['juice'];
				$_urlpart	.= '/with/' . implode('/and/', $_juices);
			}
			
			if (!empty($_POST['couleurs'])) {

				$_couleurs	= $_POST['couleurs'];
				$_urlpart	.= '/colored/' . $_couleurs;
			}
			
			if (!empty($_POST['gouts'])) {

				$gouts	= $_POST['gouts'];
				$_urlpart	.= '/tasting/' . implode('/and/', $gouts);
			}

			if (!empty($_POST['difficultes'])) {

				$_difficultes	= $_POST['difficultes'];
				$_urlpart	.= '/skill/' . $_difficultes;
			}

			if (!empty($_POST['occasions'])) {

				$occasions	= $_POST['occasions'];
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