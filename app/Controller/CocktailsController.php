<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktails\CocktailsModel;
use Model\Couleurs\CouleursModel;
use Model\Gouts\GoutsModel;
use Model\Difficultes\DifficultesModel;
use Model\Occasions\OccasionsModel;

class CocktailsController extends Controller
{
	
	private $_alcools 			= array();
	private $_urlpartalcool;
	private $_urlpartjuice;
	private $_urlpart;
	private $_cocktaillist 		= array();
	private $_error;
	private $_listeCouleurs;
	private $_listeGouts;
	private $_listeDifficultes;
	private $_listeOccasions;
	private $_formulaire 		= array();
	private $_form;
	private $_cocktailscouleur;
	private $_cocktailsgout;
	private $_cocktailsoccasion;
	private $_cocktaildifficulte;
	private $_couleur;
	private $_gout;
	private $_difficulte;
	private $_occasion;
	private $_cocktailsbest;

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


	public function createform() {
		$couleurdb = new CouleursModel();
		$_listeCouleurs = $couleurdb->getCouleurs();
		
		$goutdb = new GoutsModel();
		$_listeGouts = $goutdb->getGouts();
				
		$difficultedb = new DifficultesModel();
		$_listeDifficultes = $difficultedb->getDifficultes();

        $occasiondb = new OccasionsModel();
		$_listeOccasions = $occasiondb->getOccasions();

		$_formulaire = ['couleurs' => $_listeCouleurs, 'gouts' => $_listeGouts, 'difficultes' => $_listeDifficultes, 'occasions' => $_listeOccasions,];

		return $_formulaire;
	}

	public function showcocktails() {

		// Création du formulaire à partir des données de la dbb
		$_form = $this->createform();

		// Génération des paramètres aléatoires pour la sélection
		$couleurdb 		= new CouleursModel();
		$_couleur 		= $couleurdb->getRandomCouleurs();
		
		$goutdb 		= new GoutsModel();
		$_gout 			= $goutdb->getRandomGouts();
				
		$difficultedb 	= new DifficultesModel();
		$_difficulte 	= $difficultedb->getRandomDifficultes();

        $occasiondb 	= new OccasionsModel();
		$_occasion 		= $occasiondb->getRandomOccasions();


		$cocktails 		= new CocktailsModel();

		$_cocktailscouleur 	= $cocktails->getCocktailListBy('couleur', $_couleur['champuk'], 4);

		$_cocktailsoccasion = $cocktails->getCocktailListBy('occasion', $_occasion['champuk'], 4);

		$_cocktailsbest 	= $cocktails->getBestCocktails();

		if (($_occasion['champfr'] === "apéritif") || ($_occasion['champfr'] === "après-midi")) {$_occasion['champfr'] = 'l\'' . $_occasion['champfr'];}
		if ($_occasion['champfr'] === "digestif") {$_occasion['champfr'] = 'le ' . $_occasion['champfr'];}
		if ($_occasion['champfr'] === "soirée") {$_occasion['champfr'] = 'la ' . $_occasion['champfr'];}

		$this->show('cocktail/cocktail', [
											'form' 				=> $_form, 
											'cocktailbest'		=> $_cocktailsbest,
											'cocktailsoccasion'	=> $_cocktailsoccasion,
											'cocktailscouleur' 	=> $_cocktailscouleur, 
											'nomcouleur' 		=> $_couleur['champfr'],
										 	'nommoment'			=> $_occasion['champfr'],

										 ]);

	}







}
