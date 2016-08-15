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
			$_urloops = array();

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_POST['ingredients'])) {
				
				foreach ($_POST['ingredients'] as $ingredient) {

					if (!empty($ingredient)) {

						if (($ingredient === 'gin') || ($ingredient === 'rum') || ($ingredient === 'tequila') || ($ingredient === 'vodka') || ($ingredient === 'whisky')) 
						{

							$_urlpart 	.= '/withtype/' . $ingredient;
							$_urloops['ingredient'][$ingredient][]	 = '/withtype/' . $ingredient;
						}
						else {
							$_urlpart	.= '/with/' . $ingredient;
							$_urloops['ingredient'][$ingredient][]	 = '/with/' . $ingredient;	
						}
					}
				}
			}


			if (!empty($_POST['alcoolsprincipaux'])) {

				$_alcoolsprincipaux	 = $_POST['alcoolsprincipaux'];
				$_urlpart			.= '/withtype/' . implode('/and/', $_alcoolsprincipaux);				
				
				foreach ($_alcoolsprincipaux as $principal) {
					if (!empty ($principal)) {
						$_urloops['principal'][$principal][]	 	 = '/withtype/' . $principal;
					}
					
				}
			}
			
			if (!empty($_POST['alcools'])) {

				$_alcools	 = $_POST['alcools'];
				$_urlpart	.= '/with/' . implode('/and/', $_alcools);
				
				foreach ($_alcools as $alcool) {
					if (!empty($alcool)) {
						$_urloops['alcool'][$alcool][]	 	 = '/with/' . $alcool;
					}
				}
			}

			if (!empty($_POST['softs'])) {

				$_softs		 = $_POST['softs'];
				$_urlpart	.= '/with/' . implode('/and/', $_softs);
				foreach ($_softs as $soft) {
					if (!empty($soft)) {
						$_urloops['soft'][$soft][]	 	 = '/with/' . $soft;
					}
				}

			}

			if (!empty($_POST['epices'])) {

				$_epices	 = $_POST['epices'];
				$_urlpart	.= '/with/' . implode('/and/', $_epices);
				foreach ($_softs as $epice) {
					if (!empty($epice)) {
						$_urloops['epice'][$epice][]	 	 = '/with/' . $epice;
					}
				}			
			}

			if (!empty($_POST['fruits'])) {

				$_fruits	= $_POST['fruits'];
				$_urlpart	.= '/with/' . implode('/and/', $_fruits);
				foreach ($_fruits as $fruit) {
					if (!empty($fruit)) {
						$_urloops['fruit'][$fruit][]	 	 = '/with/' . $fruit;
					}
				}
			}
			
			if (!empty($_POST['couleurs'])) {

				$_couleurs	= $_POST['couleurs'];
				$_urlpart	.= '/colored/' . $_couleurs;
				foreach ($_couleurs as $couleur) {
					if (!empty($couleur)) {
						$_urloops['couleur'][$couleur][]	 	 = '/colored/' . $couleur;
					}
				}
			}
			
			if (!empty($_POST['gouts'])) {

				$_gouts	= $_POST['gouts'];
				$_urlpart	.= '/tasting/' . implode('/and/', $_gouts);
				foreach ($_gouts as $gout) {
					if (!empty($gout)) {
						$_urloops['gout'][$gout][]	 	 = '/tasting/' . $gout;
					}
				}

			}

			if (!empty($_POST['difficultes'])) {

				$_difficultes	= $_POST['difficultes'];
				$_urlpart	.= '/skill/' . $_difficultes;
				foreach ($_difficultes as $difficulte) {
					if (!empty($difficulte)) {
						$_urloops['difficulte'][$difficulte][]		 = '/skill/' . $difficulte;
					}
				}
			}

			if (!empty($_POST['occasions'])) {

				$_occasions	= $_POST['occasions'];
				$_urlpart	.= '/for/' . implode('/and/', $_occasions);
				foreach ($_occasions as $occasion) {
					if (!empty($occasion)) {
						$_urloops['occasion'][$occasion][]		 = '/for/' . $occasion;
					}
				}
			}


			$api = new CocktailsModel;
			$_data = $api->getCocktailListBy($_urlpart);

			$_cocktaillist = $api->fetchData($_data);
	
			if (!empty($_cocktaillist)) {
				$_nbcocktails = sizeof($_cocktaillist);
				$this->show('cocktail/recherche', ['cocktaillist' => $_cocktaillist, 'error' => '', 'form' => $_form, 'nbcocktails' => $_nbcocktails]);
			}
			else {
				$_error = '<p>Oups, aucune recette ne correspond à votre recherche !</p>
							<p>Nous vous suggérons :</p>';
				
				foreach ($_urloops as $categorie => $tabingredients) {
					
					foreach ($tabingredients as $idingredient => $taburl) {
						
						foreach ($taburl as $url) {
							$api 							= new CocktailsModel;
							$_data 							= $api->getCocktailListBy($url);
							$db 							= new IngredientsModel();
							$nomingredient					= $db->getName($idingredient);
							$_cocktailoops[$nomingredient]	= $api->getRandomCocktail($_data, 4);;		
						}
					}
				}

				$this->show('cocktail/recherche', [
													'error' 		=> $_error, 
													'form' 			=> $_form,
													'cocktailoops' 	=> $_cocktailoops,
													]);
			}	
		}
	}



































} // Fin de classe