<?php 

namespace Controller;

use \W\Controller\Controller;
use Controller\CocktailsController;
use Model\Ingredients\IngredientsModel;
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
	private $_nbcocktails;

public function searchform()
	{
		$_formcontroller = new FormController();
		$_form = $_formcontroller->createSearchForm();
		
		$api = new CocktailsModel;

		if(!$_POST) {$this->redirectToRoute('cocktails_showcocktails');}

		if ($_POST) {
			
			$_urlpart = '';

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_POST['ingredients'])) {
				
				foreach ($_POST['ingredients'] as $ingredient) {

					if (($ingredient === 'gin') || ($ingredient === 'rum') || ($ingredient === 'tequila') || ($ingredient === 'vodka') || ($ingredient === 'whisky')) 
					{

						$_urlpart .= '/withtype/' . $ingredient;

					}
					else {
						$_urlpart		.= '/with/' . $ingredient;
					}
				
				}
													var_dump($_urlpart);

			}


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

			if (!empty($_POST['epices'])) {

				$_epices	= $_POST['epices'];
				$_urlpart	.= '/with/' . implode('/and/', $_epices);
			}

			if (!empty($_POST['fruits'])) {

				$_fruits	= $_POST['fruits'];
				$_urlpart	.= '/with/' . implode('/and/', $_fruits);
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
	
			if (!empty($_cocktaillist)) {
				$_nbcocktails = sizeof($_cocktaillist);
				$this->show('cocktail/recherche', ['cocktaillist' => $_cocktaillist, 'error' => '', 'form' => $_form, 'nbcocktails' => $_nbcocktails]);
			}
			else {
				$_error = 'Oups, aucune recette ne correspond à votre recherche !';
				$this->show('cocktail/recherche', ['error' => $_error, 'form' => $_form]);
			}	
		}
	}



































} // Fin de classe