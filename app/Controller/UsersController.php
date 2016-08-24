<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Users\UsersModel;
use Model\Users\UsersAuthentificationModel;
use Model\Users\UsersProfil;
use Model\Users\ChangePassword;
use Model\Users\ChangeUsername;
use DateTime;
use DateInterval;


class UsersController extends Controller
{

	/**
	 * Formulaire d'inscription
	 */
	public function UsersInscription()
	{
		$prenom = '';
		$showform = true;
		$error = '';
		$nom	= '';
		$pseudo	= '';
		$dateNaissance	= '';
		$password	= '';
		$confirmPassword	= '';
		$email	= '';

		if($_POST)
		{
	

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

					$pseudosolo = $db->search(['username' => $pseudo]);
					$emailsolo	= $db->search(['email' => $email]);

					$now 		= new DateTime();
					$date 		= new DateTime($dateNaissance);
					$interval 	= new DateInterval('P18Y');

					if ($now->sub($interval) < $date) { $error[] = 'Vous devez avoir au moins 18 ans pour vous inscrire.' ;}


					if (!empty($pseudosolo)) { $error[] = 'Ce pseudo existe déjà !'; }
					if (!empty($pseudosolo)) { $error[] = 'Cet email existe déjà !'; }
					if ($password !== $confirmPassword) { $error[] = 'Veuillez confirmer votre mot de passe !'; }


					if (empty($error))
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
						$showform = false;					
					}

			}
		}
		
		$this->show('Users/usersinscription', [
												'showform' 			=> $showform, 
												'prenom' 			=> $prenom, 
												'nom' 				=> $nom,
												'pseudo' 			=> $pseudo,
												'dateNaissance' 	=> $dateNaissance,
												'password' 			=> $password,
												'confirmPassword' 	=> $confirmPassword,
												'email' 			=> $email,
												'error' 			=> $error
											  ]);

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

				}
			}
		}
		
		if (($_POST['url'] == '/barmiton/public/Users/connexion/') || ($_POST['url'] == '/barmiton/public/Users/inscription/')) {
			
			$this->redirectToRoute('default_home');
		}
		else {
			$this->redirect($_POST['url']);	
		}
	}

	// deconnexion

	public function UsersDeconnexion()
	{
			
			$db = new UsersAuthentificationModel;
			$db->logUserOut();

			if ($_GET['url'] == 'back_office') { $this->redirectToRoute('default_home'); }
			else { $this->redirect($_GET['url']); }
	}

	public function UsersProfil()
	{
		
		$loggedUser = $this->getUser();

		$usersdb = new UsersModel();
		$usersdb->setTable('users');

		$user = $usersdb->find($loggedUser['id']);
		

		$this->show('Users/profil', ['loggedUser' => $user]);
	}

	public function ChangePassword()
	{
		$loggedUser = $this->getUser();

		if ($_POST)
		{
			if ($_POST['newMotDePasse'] == $_POST['confirmNewMotDePasse'])
			{
				$newPassword = sha1($_POST['newMotDePasse']);
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
		
		if ($_POST) {

			$loggedUser = $this->getUser();

			if (($_POST['newUsername'] !== $loggedUser['username']) && ($_POST['newUsername'] === $_POST['newUsernameConfirm']))
			{
				$newPseudo = $_POST['newUsername'];
				$user = new UsersModel();
				$user->setTable('users');

				$user->update(['username' => $newPseudo], $loggedUser['id'], $stripTags = true);

				$this->redirectToRoute('Users_UsersProfil', [':username' => $loggedUser['username']]);
			}
		}

		$this->show('Users/changeusername');
	}


	public function showfacebook() {


		$this->show('users/facebookconnect');
	}

	public function showfavourite() {

		$this->show('favourite');
	}
}