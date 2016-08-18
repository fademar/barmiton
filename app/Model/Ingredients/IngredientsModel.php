<?php 

namespace Model\Ingredients;


class IngredientsModel extends \W\Model\Model 
{

	private $_alcools;
	private $_softs;
	private $_epices;
	private $_ingredient;
	private $_fruits;
	private $_divers;

	public function getId($nom) {
	
		$this->setTable('ingredients');
		
		$_ingredient 	= $this->search(['nomIngredient' => $nom]);
		$_id 			= $_ingredient[0]['idIngredientsApi'];

		return $_id;
	}

	public function getName($id) {
		$this->setTable('ingredients');
		
		$_ingredient 	= $this->search(['idIngredientsApi' => $id]);
		$_name 			= $_ingredient[0]['nomIngredient'];

		return $_name;
	}


	public function getAlcoolsPrincipaux() {

		$this->setTable('alcoolsprincipaux');

		$_alcools = $this->findAll();

		return $_alcools;

	}


	public function getAlcools() {

		$this->setTable('alcools');

		$_alcools = $this->findAll();

		return $_alcools;

	}

	public function getSofts() {

		$this->setTable('softs');

		$_softs = $this->findAll();

		return $_softs;
	}


	public function getEpices() {

		$this->setTable('epices');

		$_epices = $this->findAll();

		return $_epices;
	}

	public function getFruits() {

		$this->setTable('fruits');

		$_fruits = $this->findAll();

		return $_fruits;
	}

	public function getDivers() {

		$this->setTable('divers');

		$_divers = $this->findAll();

		return $_divers;
	}


} // fin de classe