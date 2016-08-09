<?php

namespace Model\Occasions;

class OccasionsModel extends \W\Model\Model 
{

	private $_listeOccasions;
	private $_arraykey;
	private $_occasionrandom;
	
	/**
	 * Récupère la liste des occasions en BDD
	 */
	public function getOccasions() {
		
		$_listeOccasions = $this->findAll();

		return $_listeOccasions;
	}

	public function getRandomOccasions() {

		$_listeOccasions	= $this->findAll();
		$_arraykey	 		= array_rand($_listeOccasions, 1);
		$_occasionrandom	= $_listeOccasions[$_arraykey];

		return $_occasionrandom;
	}

}