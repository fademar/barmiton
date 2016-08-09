<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktails\CocktailsModel;

class DefaultController extends Controller
{
	private $_cocktailselection;
	private $_cocktailapi;

	/**
	 * Page d'accueil par défaut
	 */


	public function home()
	{
		$_cocktailapi		 = new CocktailsModel();
		$_cocktailselection	 = $_cocktailapi->getCocktailListBy('tout', 'home');
			
		$this->show('default/home', ['cocktailselection' => $_cocktailselection]);
	}



}