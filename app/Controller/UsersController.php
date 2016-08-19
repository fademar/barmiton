<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Users\UsersModel;
use Model\Users\UsersAuthentificationModel;
use Model\Users\UsersProfil;
use Model\Users\ChangePassword;
use Model\Users\ChangeUsername;

class UsersController extends Controller
{

	/**
	 * Formulaire d'inscription
	 */
	public function UsersInscription()
	{
		if($_POST)
		{
			//-- j'enclenche les verifications d'usage sur les donnée saisie
			//-- Je procède à mon insertion en base de donnée. J'appelle mon model charger de l'inscription de mon membre
			//-- 

			$db = new UsersModel;

			if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['dateNaissance']) && isset($_POST['motDePasse']) && isset($_POST['confirmMotDePasse']) && isset($_POST['email']))
			{
					$nom 						= $_POST['nom'];
					$prenom 					= $_POST['prenom'];
					$pseudo 					= $_POST['username'];
					$dateNaissance 				= $_POST['dateNaissance'];
					$password 					= $_POST['motDePasse'];
					$confirmPassword 			= $_POST['confirmMotDePasse'];
					$email 						= $_POST['email'];

					if ($password == $confirmPassword)
					{
						
						$data = array(
							'nom' 				=> $nom,
							'prenom' 			=> $prenom,
							'username' 			=> $pseudo,
							'date_naissance' 	=> $dateNaissance,
							'password' 			=> password_hash($password, PASSWORD_DEFAULT),
							'email' 			=> $email
						);
				

						$db->insert($data);
					}

					else
					{
						echo "Les mots de passe ne sont pas identiques";
					}


				$this->redirectToRoute('default_home');
			}
		}

		$this->show('users/usersinscription');

	}


	/**
	 * Formulaire de connexion
	 */
	public function UsersConnexion()
	{
		// -- recuperation et verification des donnée POST 

		// -- Verification de mon utilisateur avec la BDD

		// -- Si tous est Ok on le connecte puis on le redirige

		if ($_POST)
		{
			$db = new UsersAuthentificationModel;

			if (isset($_POST['email']) && isset($_POST['motDePasse']))
			{
				$email			= $_POST['email'];
				$password 		= $_POST['motDePasse'];
			
				$id = $db->isValidLoginInfo($_POST['email'], $_POST['motDePasse']);

				if ($id > 0)
				{
					$users = new UsersModel;

					$db->logUserIn($users->find($id));

					$this->redirectToRoute('default_home');

				}
			}
		}

		$this->show('users/usersconnexion');
	}

	// deconnexion

	public function UsersDeconnexion()
	{
			$db = new UsersAuthentificationModel;
			$db->logUserOut();

			$this->redirectToRoute('default_home');
	}

	public function UsersProfil()
	{
		$loggedUser = $this->getUser();
		$this->show('Users/profil', ['loggedUser'=> $loggedUser]);
	}

	public function ChangePassword()
	{
		$loggedUser = $this->getUser();

		if ($_POST)
		{
			if ($_POST['newMotDePasse'] == $_POST['confirmNewMotDePasse'])
			{
				$newPassword=sha1($_POST['newMotDePasse']);
			}
			else
			{
				$error = "Vos nouveaux mot de passe ne sont identiques";
			}

			$this->redirectToRoute('Users_UsersProfil');
		}

		$this->show('Users/changepassword', ['loggedUser'=> $loggedUser]);
	}

	public function ChangeUsername()
	{ 
		$loggedUser = $this->getUser();

		if ($_POST)
		{
			if ($_POST['username'] !== $_POST['newUsername'])
			{
				$newPseudo = ($_POST['newUsername']);
			}
			else
			{
				$error = "Vous avez utilisé votre pseudo actuel";
			}

			$this->redirectToRoute('Users_UsersProfil');
		}

		$this->show('Users/changeusername', ['loggedUser'=> $loggedUser]);
	}
}