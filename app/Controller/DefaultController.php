<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\AutocompleteController;
use Model\Cocktails\CocktailsModel;

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
		$_cocktailselection	 = $_cocktailapi->getCocktailListBy('all');
		$_cocktailselection	 = $_cocktailapi->getRandomCocktail($_cocktailselection, 6);
	
		//$_autocomplete = new AutocompleteController();
		//$_autocomplete->autoComplete();

		$this->show('default/home', ['cocktailselection' => $_cocktailselection]);
	}



}