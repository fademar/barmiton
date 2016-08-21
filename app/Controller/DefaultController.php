<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\AutocompleteController;
use Model\Cocktails\CocktailsModel;
use Model\Occasions\OccasionsModel;
use Model\Gouts\GoutsModel;

class DefaultController extends Controller
{
	private $_cocktailselection;
	private $_cocktailapi;
	private $_autocomplete;

	/**
	 * Page d'accueil par défaut
	 */


	public function home()
	{
		$_cocktailapi		 = new CocktailsModel();
		$_url				 = $_cocktailapi->constructUrl('all');
		$_cocktailselection	 = $_cocktailapi->getCocktailListBy($_url);
		$_cocktailselection	 = $_cocktailapi->getRandomCocktail($_cocktailselection['list'], 6);
		
		foreach ($_cocktailselection as $cocktail) {
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

			$_cocktailselectionfr[] = $cocktail;
		}


		$this->show('default/home', ['cocktailselection' => $_cocktailselectionfr]);
	}



}