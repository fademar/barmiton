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

	
	// Création du formulaire de recherche avancée à partir des données de la bdd


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


	// Construction de la page cocktails avec le formulaire de recherche avancée et les sélections de cocktails

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

		$_cocktailscouleur 	= $cocktails->getCocktailListBy('couleur', $_couleur['champuk']);
		$_cocktailscouleur = $cocktails->getRandomCocktail($_cocktailscouleur, 4);

		$_cocktailsoccasion = $cocktails->getCocktailListBy('occasion', $_occasion['champuk']);
		$_cocktailsoccasion = $cocktails->getRandomCocktail($_cocktailsoccasion, 4);

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
