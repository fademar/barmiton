<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$loggedUser = $this -> getUser();
		$this->show('default/home', ['loggedUser'=>$loggedUser]);
	}

}