<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\FormController;
use Model\Cocktails\CocktailsModel;
use Model\Couleurs\CouleursModel;
use Model\Gouts\GoutsModel;
use Model\Difficultes\DifficultesModel;
use Model\Occasions\OccasionsModel;
use Model\Favoris\FavorisModel;
use Model\Notes\NotesModel;

class CocktailsController extends Controller
{
	
	
	private $_formcontrol;
	private $_form;
	private $_cocktailscouleur;
	private $_cocktailsgout;
	private $_cocktailsoccasion;
	private $_cocktaildifficulte;
	private $_couleur;
	private $_gout;
	private $_difficulte;
	private $_occasion;



	// Construction de la page cocktails avec le formulaire de recherche avancée et les sélections de cocktails

	public function showcocktails() {

		// Création du formulaire à partir des données de la dbb
		$_formcontrol 	= new FormController();
		$_form			= $_formcontrol->createSearchForm();

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

		$_cocktailscouleur 	= $cocktails->getCocktailListBy('/colored/' . $_couleur['champuk']);
		$_cocktailscouleur 	= $cocktails->getRandomCocktail($_cocktailscouleur, 4);

		$_cocktailsoccasion = $cocktails->getCocktailListBy('/for/' . $_occasion['champuk']);
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



	public function afficherCocktail($id)
	{
		$ficheCocktails = new CocktailsModel();
		$dataCocktail = $ficheCocktails->getcocktaildata($id);

		


		// Ajout des favoris

		if($_POST) {

		$objetFavoris = new FavorisModel();
		$objetFavoris->setTable('favoris');

			if (isset($_POST['ajouterFavoris']))
			{
				
				$User = $this->getUser();
				$idMembres = $User['id'];

				$data = array(

					'iddrink' => $id,
					'idMembres' => $idMembres
				);
				

				$objetFavoris->insert($data);

					sleep(1);

				$this->redirectToRoute('cocktails_afficher_cocktail', ['id' => $dataCocktail['id']]);
				
			}

		/*Ajout des notes*/

			if (isset($_POST['noter']))	{


					$objetNotes = new NotesModel();
					$objetNotes->setTable('cocktails');
					$objetNotes->setPrimaryKey('id');


					$cocktailNote = $objetNotes->search(array('idCocktailApi' => $_POST['iddrink']));

					$compteurnote 	= $cocktailNote[0]['compteurnote'] + 1;
					$note 			= $cocktailNote[0]['note'] + $_POST['note'];


				$dataNote = array(
					'compteurnote' 	=> $compteurnote,
					'note'			=> $note
				);	
		

				$objetNotes->update($dataNote, $cocktailNote[0]['id']);


					sleep(1);
				$this->redirectToRoute('cocktails_afficher_cocktail', ['id' => $dataCocktail['id']]);
			}
				



		}


		$this->show('cocktail/fiche_cocktail', ['dataCocktail' => $dataCocktail]);

	}











}
