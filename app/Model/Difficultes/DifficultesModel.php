<?php

namespace Model\Difficultes;

class DifficultesModel extends \W\Model\Model 
{

	private $_listeDifficultes;

	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getDifficultes() {
		
		$_listeDifficultes = $this->findAll();

		return $_listeDifficultes;
	}




}