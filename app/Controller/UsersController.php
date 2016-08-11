<?php

namespace Controller;

use \W\Controller\Controller;

class UsersController extends Controller
{

	/**
	 * Formulaire d'inscription
	 */
	public function usersinscription()
	{
		$this->show('users/usersinscription');

	}


	/**
	 * Formulaire de connexion
	 */
	public function usersconnexion()
	{
		$this->show('users/usersconnexion');
	}
}