<?php

namespace Model\Difficultes;

class DifficultesModel extends \W\Model\Model 
{

	private $_listeDifficultes;
	private $_arraykey;
	private $_difficulterandom;

	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getDifficultes() {
		
		$_listeDifficultes = $this->findAll();

		return $_listeDifficultes;
	}

	public function getRandomDifficultes() {

		$_listeDifficultes		= $this->findAll();
		$_arraykey 				= array_rand($_listeDifficultes, 1);
		$_difficulterandom		= $_listeDifficultes[$_arraykey];

		return $_difficulterandom;
	}


}