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

		if(!$_GET) {$this->redirectToRoute('cocktails_showcocktails');}

		if ($_GET) {

			$_urlpart = '';
			$_urloops = array();
<<<<<<< HEAD
			$query = '';
=======
>>>>>>> origin/travail-pierre-fiche-cocktail_1808

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_GET['ingredients'])) {
				
				foreach ($_GET['ingredients'] as $ingredient) {

					if (!empty($ingredient)) {

<<<<<<< HEAD
						$query .= "ingredient[]=" . $ingredient;

=======
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
						if (($ingredient === 'gin') || ($ingredient === 'rum') || ($ingredient === 'tequila') || ($ingredient === 'vodka') || ($ingredient === 'whisky')) 
						{

							$_urlpart 	.= '/withtype/' . $ingredient;
							$_urloops['ingredient'][$ingredient][]	 = '/withtype/' . $ingredient;
						}
						else {
							$_urlpart	.= '/with/' . $ingredient;
							$_urloops['ingredient'][$ingredient][]	 = '/with/' . $ingredient;	
<<<<<<< HEAD
							
=======
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
						}
					}
				}
			}


			if (!empty($_GET['alcoolsprincipaux'])) {

				$_alcoolsprincipaux	 = $_GET['alcoolsprincipaux'];
				$_urlpart			.= '/withtype/' . implode('/and/', $_alcoolsprincipaux);				
				
				foreach ($_alcoolsprincipaux as $principal) {
					if (!empty ($principal)) {
						$_urloops['principal'][$principal][]	 	 = '/withtype/' . $principal;
					}
					
				}
			}
			
			if (!empty($_GET['alcools'])) {

<<<<<<< HEAD
				$_alcools	 = $_GET['alcools'];
=======
				$_alcools	 = $_POST['alcools'];
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
				$_urlpart	.= '/with/' . implode('/and/', $_alcools);
				
				foreach ($_alcools as $alcool) {
					if (!empty($alcool)) {
						$_urloops['alcool'][$alcool][]	 	 = '/with/' . $alcool;
					}
				}
			}

			if (!empty($_GET['softs'])) {

<<<<<<< HEAD
				$_softs		 = $_GET['softs'];
=======
				$_softs		 = $_POST['softs'];
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
				$_urlpart	.= '/with/' . implode('/and/', $_softs);
				foreach ($_softs as $soft) {
					if (!empty($soft)) {
						$_urloops['soft'][$soft][]	 	 = '/with/' . $soft;
					}
				}

			}

			if (!empty($_GET['epices'])) {

<<<<<<< HEAD
				$_epices	 = $_GET['epices'];
=======
				$_epices	 = $_POST['epices'];
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
				$_urlpart	.= '/with/' . implode('/and/', $_epices);
				foreach ($_softs as $epice) {
					if (!empty($epice)) {
						$_urloops['epice'][$epice][]	 	 = '/with/' . $epice;
					}
				}			
			}

			if (!empty($_GET['fruits'])) {

				$_fruits	= $_GET['fruits'];
				$_urlpart	.= '/with/' . implode('/and/', $_fruits);
				foreach ($_fruits as $fruit) {
					if (!empty($fruit)) {
						$_urloops['fruit'][$fruit][]	 	 = '/with/' . $fruit;
					}
				}
			}
			
			if (!empty($_GET['couleurs'])) {

<<<<<<< HEAD
				$_couleurs	= $_GET['couleurs'];
				$_urlpart	.= '/colored/' . implode('/or/', $_couleurs);;
=======
				$_couleurs	= $_POST['couleurs'];
				$_urlpart	.= '/colored/' . $_couleurs;
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
				foreach ($_couleurs as $couleur) {
					if (!empty($couleur)) {
						$_urloops['couleur'][$couleur][]	 	 = '/colored/' . $couleur;
					}
				}
			}
			
			if (!empty($_GET['gouts'])) {

				$_gouts	= $_GET['gouts'];
				$_urlpart	.= '/tasting/' . implode('/and/', $_gouts);
				foreach ($_gouts as $gout) {
					if (!empty($gout)) {
						$_urloops['gout'][$gout][]	 	 = '/tasting/' . $gout;
					}
				}

			}

<<<<<<< HEAD
			if (!empty($_GET['difficultes'])) {

				$_difficultes	= $_GET['difficultes'];
				$_urlpart	.= '/skill/' . implode('/or/', $_difficultes);
				foreach ($_difficultes as $difficulte) {
					if (!empty($difficulte)) {
						$_urloops['difficulte'][$difficulte][]		 = '/skill/' . $difficulte;
					}
				}
=======
				$_gouts	= $_POST['gouts'];
				$_urlpart	.= '/tasting/' . implode('/and/', $_gouts);
				foreach ($_gouts as $gout) {
					if (!empty($gout)) {
						$_urloops['gout'][$gout][]	 	 = '/tasting/' . $gout;
					}
				}

>>>>>>> origin/travail-pierre-fiche-cocktail_1808
			}

			if (!empty($_GET['occasions'])) {

<<<<<<< HEAD
				$_occasions	= $_GET['occasions'];
				$_urlpart	.= '/for/' . implode('/and/', $_occasions);
				foreach ($_occasions as $occasion) {
					if (!empty($occasion)) {
						$_urloops['occasion'][$occasion][]		 = '/for/' . $occasion;
=======
				$_difficultes	= $_POST['difficultes'];
				$_urlpart	.= '/skill/' . $_difficultes;
				foreach ($_difficultes as $difficulte) {
					if (!empty($difficulte)) {
						$_urloops['difficulte'][$difficulte][]		 = '/skill/' . $difficulte;
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
					}
				}
			}

			$url 			= $api->constructUrl($_urlpart);


<<<<<<< HEAD



			// ---------------- PAGINATION ---------------- //

			if (!isset($_GET['page'])) {
				$_data 			= $api->getCocktailListBy($url . "&pageSize=24");
				$_cocktaillist 	= $api->fetchData($_data);
				$_querypage		= $_SERVER['QUERY_STRING'];
				
=======
				$_occasions	= $_POST['occasions'];
				$_urlpart	.= '/for/' . implode('/and/', $_occasions);
				foreach ($_occasions as $occasion) {
					if (!empty($occasion)) {
						$_urloops['occasion'][$occasion][]		 = '/for/' . $occasion;
					}
				}
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
			}
			else {					
				$page 				= $_GET['page'];
				$page 				= ($page -1) * 25;
				$nextURL 			= $url."&start=" . $page . "&pageSize=24";
				$_data 				= $api->getCocktailListBy($nextURL);
				$_cocktaillist 		= $api->fetchData($_data);

				$URLExp = explode('&', $_SERVER['QUERY_STRING']);
				$nbRech = count($URLExp);

				for ($i=0; $i < $nbRech - 1; $i++) { 
					$urlNextFinal[] = $URLExp[$i];
				}

				$_querypage = implode ('&', $urlNextFinal);

			}

			$nbpages = ceil($_data['totalresult'] / 24);			




			if (!empty($_cocktaillist)) {
				$this->show('cocktail/recherche', [
													'cocktaillist' 	=> $_cocktaillist, 
													'error' 		=> '', 
													'form' 			=> $_form, 
													'nbcocktails' 	=> $_data['totalresult'],
													'nbpages'		=> $nbpages,	
													'querypage'		=> $_querypage
												]);
			}
			else {
<<<<<<< HEAD
				$_error = '<div class="oops">Oups, aucune recette ne correspond à votre recherche !</div>
							<div class="oops">Nous vous suggérons :</div>';
=======
				$_error = '<p>Oups, aucune recette ne correspond à votre recherche !</p>
							<p>Nous vous suggérons :</p>';
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
				
				foreach ($_urloops as $categorie => $tabingredients) {
					
					foreach ($tabingredients as $idingredient => $taburl) {
						
<<<<<<< HEAD
						foreach ($taburl as $urlpart) {
							$api 	= new CocktailsModel;
							$url 	= $api->constructUrl($urlpart);
							$_data 	= $api->getCocktailListBy($url);
							
							switch($idingredient) //Changement des noms des alcools principaux
=======
						foreach ($taburl as $url) {
							$api 							= new CocktailsModel;
							$_data 							= $api->getCocktailListBy($url);
							
							switch($idingredient)
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
							{
								case 'gin' : 
									$nomingredient = 'Gin';
									break;
								case 'rum' :
									$nomingredient = 'Rhum';
									break;
								case 'tequila' : 
									$nomingredient = 'Tequila';
									break;
								case 'vodka' : 
									$nomingredient = 'Vodka';
									break;
								case 'whisky' : 
<<<<<<< HEAD
									$nomingredient = 'Whisky';
=======
									$nomingredient = 'Whisky'
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
									break;
								default : 
									$db 			= new IngredientsModel();
									$nomingredient	= $db->getName($idingredient);
							}
<<<<<<< HEAD

							if (count($_data['list']) > 4) {
								$_cocktailoops[$nomingredient]	= $api->getRandomCocktail($_data, 4);;		
							}
							else {
								$_cocktailoops[$nomingredient]	= $api->fetchData($_data);
							}
=======
								
							$_cocktailoops[$nomingredient]	= $api->getRandomCocktail($_data, 4);;		
							
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
						}
					}
				}

				$this->show('cocktail/recherche', [
<<<<<<< HEAD
													'totalresult'	=> $_data['totalresult'],
=======
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
													'error' 		=> $_error, 
													'form' 			=> $_form,
													'cocktailoops' 	=> $_cocktailoops,
													]);
			}	
		}
	}




































} // Fin de classe