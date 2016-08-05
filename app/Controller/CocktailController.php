<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktail\CocktailModel;

class CocktailController extends Controller
{
	
	private $_alcools = array();
	private $_urlpart = '';
	private $_cocktaillist = array();

	public function getformhome()
	{
		
		if (isset($_POST['submit'])) {
			
			$_alcools = $_POST['alcool'];
			
			/**************** Construction de l'url pour la requête auprès de l'API ******************/
			foreach ($_alcools as $alcool) 
			{
				$_urlpart .= "withtype/" . $alcool . "/"; 
			}
				// echo $_urlpart;
			
			$api = new CocktailModel;
			$_cocktaillist = $_api->getcocktaillist($_urlpart);
		
		}
		

		$this->show('cocktail/cocktail', ['cocktaillist' => $_cocktaillist]);
	}
}
