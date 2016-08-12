<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Ingredients\IngredientsModel;


class AutocompleteController extends Controller {

	private $_ingredientsdb;
	private $_alcoolsnoms;
	private $_alcoolsdb;
	private $_alcoolstab;
	private $_alcoolsjson;
	private $_softsdb;
	private $_softstab;
	private $_softsjson;
	private $_fruitsdb;
	private $_fruitstab;
	private $_fruitsjson;
	private $_epicesdb;
	private $_epicestab;
	private $_epicesjson;


	// Json alcools
	public function autoCompleteAlcools() {

		$_ingredientsdb = new IngredientsModel();
		$_alcoolsdb = $_ingredientsdb->getAlcools();
		
		foreach ($_alcoolsdb as $value) {
			$_alcoolstab[] = $value['nomIngredient'];
		}

		$_alcoolsjson = $this->showJson($_alcoolstab);

		$this->show('data/alcools', ['alcoolsjson' => $_alcoolsjson]);
	}

	// Json softs
	
	public function autoCompleteSofts() {
		
		$_ingredientsdb = new IngredientsModel();
		$_softsdb = $_ingredientsdb->getSofts();
		
		foreach ($_softsdb as $value) {
			$_softstab[] = $value['nomIngredient'];
		}

		$_softsjson = $this->showJson($_softstab);

		$this->show('data/softs', ['softsjson' => $_softsjson]);

	}

		// Json fruits
	public function autoCompleteFruits() {

		$_ingredientsdb = new IngredientsModel();
		$_fruitsdb = $_ingredientsdb->getSofts();
		
		foreach ($_fruitsdb as $value) {
			$_fruitstab[] = $value['nomIngredient'];
		}

		$_fruitsjson = $this->showJson($_fruitstab);

		$this->show('data/fruits', ['fruitsjson' => $_fruitsjson]);

	}


	// Json epices
	
	public function autoCompleteEpices() {

		$_ingredientsdb = new IngredientsModel();
		$_epicesdb = $_ingredientsdb->getEpices();
		
		foreach ($_epicesdb as $value) {
			$_epicestab[] = $value['nomIngredient'];
		}

		$_epicesjson = $this->showJson($_epicestab);

		$this->show('data/epices', ['epicesjson' => $_epicesjson]);
	}




}


