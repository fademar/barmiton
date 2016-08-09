<?php

namespace Model\Gouts;

class GoutsModel extends \W\Model\Model 
{

	private $_listeGouts;
	private $_arraykey;
	private $_goutrandom;
	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getGouts() {
		
		$_listeGouts = $this->findAll();

		return $_listeGouts;
	}

	public function getRandomGouts() {

		$_listeGouts		= $this->findAll();
		$_arraykey 			= array_rand($_listeGouts, 1);
		$_goutrandom		= $_listeGouts[$_arraykey];

		return $_goutrandom;
	}


}