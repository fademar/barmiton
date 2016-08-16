<?php 

namespace Controller;

use \W\Controller\Controller;
use Model\Cocktails\CocktailsModel;


class RechercheController extends Controller
{

	public function showNext($page) {

		$api 	= new CocktailsModel();
		$_data 	= $api->getNext()

		$url = "https://addb.absolutdrinks.com/drinks/withtype/gin/?apiKey=2c758736e5f844bdb9d39308df889c6d&start=".$page."&pageSize=25"

	}









}

