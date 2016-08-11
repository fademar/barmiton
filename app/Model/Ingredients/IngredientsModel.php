<?php 

namespace Model\Ingredients;


class IngredientsModel extends \W\Model\Model 
{

	private $_alcools;
	private $_softs;
	private $_epices;



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




} // fin de classe