<?php 

namespace Controller;

use \W\Controller\Controller;
use Controller\CocktailsController;
use Model\Ingredients\IngredientsModel;
use Model\Cocktails\CocktailsModel;
use Model\Occasions\OccasionsModel;
use Model\Gouts\GoutsModel;

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

			$query = '';

			/**************** Construction de l'url pour la requête des cocktails ******************/

			if (!empty($_GET['ingredients'])) {
				
				foreach ($_GET['ingredients'] as $ingredient) {

					if (!empty($ingredient)) {


						$query .= "ingredient[]=" . $ingredient;

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


				$_alcools	 = $_GET['alcools'];

				$_urlpart	.= '/with/' . implode('/and/', $_alcools);
				
				foreach ($_alcools as $alcool) {
					if (!empty($alcool)) {
						$_urloops['alcool'][$alcool][]	 	 = '/with/' . $alcool;
					}
				}
			}

			if (!empty($_GET['softs'])) {

				$_softs		 = $_GET['softs'];

				$_urlpart	.= '/with/' . implode('/and/', $_softs);
				foreach ($_softs as $soft) {
					if (!empty($soft)) {
						$_urloops['soft'][$soft][]	 	 = '/with/' . $soft;
					}
				}

			}

			if (!empty($_GET['epices'])) {
				$_epices	 = $_GET['epices'];

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

				$_couleurs	= $_GET['couleurs'];
				$_urlpart	.= '/colored/' . implode('/or/', $_couleurs);;

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

			if (!empty($_GET['difficultes'])) {

				$_difficultes	= $_GET['difficultes'];
				$_urlpart	.= '/skill/' . implode('/or/', $_difficultes);
				foreach ($_difficultes as $difficulte) {
					if (!empty($difficulte)) {
						$_urloops['difficulte'][$difficulte][]		 = '/skill/' . $difficulte;
					}
				}

			}

			if (!empty($_GET['occasions'])) {


				$_occasions	= $_GET['occasions'];
				$_urlpart	.= '/for/' . implode('/and/', $_occasions);
				foreach ($_occasions as $occasion) {
					if (!empty($occasion)) {
						$_urloops['occasion'][$occasion][]		 = '/for/' . $occasion;

					}
				}
			}

			$url	= $api->constructUrl($_urlpart);
 

				// ---------------- PAGINATION ---------------- //

				if (!isset($_GET['page'])) {
					$_data 			= $api->getCocktailListBy($url . "&pageSize=24");
					$_cocktaillist 	= $api->fetchData($_data);
					$_querypage		= $_SERVER['QUERY_STRING'];
					

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

				$_error = '<div class="oops">Oups, aucune recette ne correspond à votre recherche !</div>
							<div class="oops">Nous vous suggérons :</div>';

				
				foreach ($_urloops as $categorie => $tabingredients) {
					
					foreach ($tabingredients as $idingredient => $taburl) {

						foreach ($taburl as $urlpart) {
							$api 	= new CocktailsModel;
							$url 	= $api->constructUrl($urlpart);
							$_data 	= $api->getCocktailListBy($url);
								

							switch($idingredient) //Changement des noms des alcools principaux

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

									$nomingredient = 'Whisky';

									break;
								default : 
									$db 			= new IngredientsModel();
									$nomingredient	= $db->getName($idingredient);
							}

							if (count($_data['list']) > 4) {
								
								$_randomlist = $api->getRandomCocktail($_data['list'], 4);		
								
								foreach ($_randomlist as $cocktail) {
									$occasionstab = array();
									$goutstab = array();

									$occasionsdb = new OccasionsModel();

									foreach ($cocktail['occasions'] as $key => $occasion) {		
										$occasionsdata = $occasionsdb->search(['champuk' => $occasion->id]);				
										switch ($occasionsdata[0]['champfr']) {
											case "après-midi":
											$occasionfr = 'l\'après-midi';
											break;
											case "apéritif":
											$occasionfr = 'l\'apéritif';
											break;
											case "digestif":
											$occasionfr = 'le digestif';
											break;
											case "soirée":
											$occasionfr = 'la soirée';
											break;
										}

										$occasionstab[] = $occasionfr;

									}

									$cocktail['occasions'] = implode(', ', $occasionstab);

									$goutsdb = new GoutsModel();

									foreach ($cocktail['gouts'] as $key => $gout) {
										$goutsdata = $goutsdb->search(['champuk' => $gout->id]);
										$goutstab[] = $goutsdata[0]['champfr'];
									}

									$cocktail['gouts'] = implode(', ', $goutstab);

									$_cocktailoops[$nomingredient][] = $cocktail;
								}
																
							}
							else {
								$_cocktailoops[$nomingredient]	= $api->fetchData($_data);
							}

						}
					}
				}

				$this->show('cocktail/recherche', [
													'totalresult'	=> $_data['totalresult'],

													'error' 		=> $_error, 
													'form' 			=> $_form,
													'cocktailoops' 	=> $_cocktailoops,
													'nbpages'		=> 0
													]);
			}	
		}
	}




































} // Fin de classe