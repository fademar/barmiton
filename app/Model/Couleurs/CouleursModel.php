<?php

namespace Model\Couleurs;

class CouleursModel extends \W\Model\Model 
{

	private $_listeCouleurs;

	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getCouleurs() {
		
		$_listeCouleurs = $this->findAll();

		return $_listeCouleurs;
	}
















}