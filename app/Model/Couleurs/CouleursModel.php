<?php

namespace Model\Couleurs;

class CouleursModel extends \W\Model\Model 
{

	private $_listeCouleurs;
	private $_arraykey;
	private $_couleurrandom;
	/**
	 * Récupère la liste des couleurs en BDD
	 */
	public function getCouleurs() {
		
		$_listeCouleurs = $this->findAll();

		return $_listeCouleurs;
	}


	public function getRandomCouleurs() {

		$_listeCouleurs		= $this->findAll();
		$_arraykey 			= array_rand($_listeCouleurs, 1);
		$_couleurrandom		= $_listeCouleurs[$_arraykey];

		return $_couleurrandom;
	}













}