<?php

namespace Model\Gouts;

class GoutsModel extends \W\Model\Model 
{

	private $_listeGouts;

	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getGouts() {
		
		$_listeGouts = $this->findAll();

		return $_listeGouts;
	}




}