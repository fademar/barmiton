<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktails\CocktailsModel;

class DefaultController extends Controller
{
	private $_cocktailselection;
	private $_api;

	/**
	 * Page d'accueil par défaut
	 */


	public function home()
	{
		$_api = new CocktailsModel();
		$_cocktailselection = $_api->getcocktailselection();
			
		$this->show('default/home', ['cocktailselection' => $_cocktailselection]);
	}



}