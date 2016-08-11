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
		$_cocktailselection	 = $_cocktailapi->getCocktailList('all');
		$_cocktailselection	 = $_cocktailapi->getRandomSelection($_cocktailselection, 6);
	
		$this->show('default/home', ['cocktailselection' => $_cocktailselection]);
	}



}