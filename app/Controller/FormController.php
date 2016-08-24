<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Ingredients\IngredientsModel;
use Model\Couleurs\CouleursModel;
use Model\Gouts\GoutsModel;
use Model\Difficultes\DifficultesModel;
use Model\Occasions\OccasionsModel;


class FormController extends Controller
{

	private $_ingredientsdb;
	private $_listeAlcools;
	private $_listeSofts;
	private $_listeEpices;
	private $_couleurdb;
	private $_listeCouleurs;
	private $_goutdb;
	private $_listeGouts;
	private $difficultedb;
	private $_listeDifficultes;
	private $_occasiondb;
	private $_listeOccasions;
	private $_formulaire;


	public function createSearchForm() {
	
		$_ingredientsdb		= new IngredientsModel();
		$_listePrincipaux	= $_ingredientsdb->getAlcoolsPrincipaux();
		$_listeAlcools		= $_ingredientsdb->getAlcools();
		$_listeSofts 		= $_ingredientsdb->getSofts();
		$_listeEpices 		= $_ingredientsdb->getEpices();
		$_listeFruits		= $_ingredientsdb->getFruits();

		$_couleurdb			= new CouleursModel();
		$_listeCouleurs 	= $_couleurdb->getCouleurs();
		
		$_goutdb			= new GoutsModel();
		$_listeGouts 		= $_goutdb->getGouts();
				
		$_difficultedb 		= new DifficultesModel();
		$_listeDifficultes 	= $_difficultedb->getDifficultes();

        $_occasiondb 		= new OccasionsModel();
		$_listeOccasions 	= $_occasiondb->getOccasions();

		$_formulaire 		=  [
								'alcoolsprincipaux' => $_listePrincipaux,
								'alcools' 			=> $_listeAlcools, 
								'softs' 			=> $_listeSofts,
								'fruits'			=> $_listeFruits,
								'épices'			=> $_listeEpices, 
								'couleurs' 			=> $_listeCouleurs,
								'gouts' 			=> $_listeGouts, 
								'difficultes' 		=> $_listeDifficultes, 
								'occasions' 		=> $_listeOccasions,
								];

		return $_formulaire;
	}








} // Fin de classe
