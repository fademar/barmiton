<?php

namespace Model\Occasions;

class OccasionsModel extends \W\Model\Model 
{

	private $_listeOccasions;

	/**
	 * Récupère la liste des occasions en BDD
	 */
	public function getOccasions() {
		
		$_listeOccasions = $this->findAll();

		return $_listeOccasions;
	}


}