<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Admin\AdminModel;
use Model\Cocktails\CocktailsModel;
use Model\Recettes\RecettesModel;

class AdminController extends Controller
{

	private $_admin;
	private $_cocktaildata;


	public function admin()
	{
		$this->allowTo('1');
		$_admin = new AdminModel();
		$_updates = $_admin->getLastUpdates();
		$_cocktaildata = array();


		$this->show('admin/admin', [
												'updates' 		=> $_updates,
											]);

	}


	public function admincocktails() {
		$this->allowTo('1');
		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['langue' => 'en', 'ordre' => 1], $operator = 'AND');
		
		foreach ($_recettedata as $recette) {
			
			if ($recette['ordre'] < 10) {
				$listrecettes[] = array('id' => $recette['id'], 'idcocktail' => $recette['idcocktail']); 				
			}

		}

		$this->show('admin/adminupdates', [
												'listrecettes' 	=> $listrecettes
											]);



	}

	public function modifierCocktail($idcocktail) {

		$this->allowTo('1');
		$_cocktaildb = new CocktailsModel();
		$_cocktaildb->setTable('cocktails');
		$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $idcocktail]);


		if ($_POST) {
			$_cocktaildb->update([
									'id' => $_POST['iddb'],
									'idCocktailApi' => $_POST['idcocktail'],
									'nomCocktail' => $_POST['nom'],
									'description' => $_POST['description'], 
									'note' => $_POST['note'],
									'compteurnote' => $_POST['compteurnote'],
									'langue' => $_POST['langue']],
									$_POST['iddb'], $stripTags = true);

			$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $idcocktail]);

		}


		$this->show('admin/modifcocktail', [
												'cocktaildata' 	=> $_cocktaildata[0],

											]);
	}


	public function modifierRecette($idcocktail) {

		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['idcocktail' => $idcocktail]);


		if ($_POST) {

			$_recettedb->update([
									'id' 	=> $_POST['id'],
									'idcocktail' => $_recettedata[0]['idcocktail'],
									'texte' => $_POST['texte'],
									'description' => $_POST['description'],
									'ordre' => $_recettedata[0]['ordre'],
									'langue' => $_POST['langue']],
									$_POST['id'], $stripTags = true);

			$_recettedata = $_recettedb->search(['idcocktail' => $idcocktail]);


		} 

		$this->show('admin/modifrecettes', ['recettedata' => $_recettedata]);

	}






	public function modifierMembre($id)
	{
		$this->allowTo('1');
		$db = new AdminModel;
		$db->setTable('users');
		$db->setPrimaryKey('id');
		$user = $db->find($id);

		//UPDATE DE LA BDD
		if (isset($_POST['modifier']))
		{
			if (empty($_POST['username']))
			{
				$username = $user['username'];
			}
			else
			{
				$username = $_POST['username'];
			}

			if (empty($_POST['email']))
			{
				$email = $user['email'];
			}
			else
			{
				$email = $_POST['email'];
			}

			if (empty($_POST['role']))
			{
				$role = $user['role'];
			}
			else
			{
				$role = $_POST['role'];
			}

			$data= array(
				'id' => $user['id'],
				'Nom' => $user['Nom'],
				'Prenom' => $user['Prenom'],
				'date_naissance' => $user['date_naissance'],
				'username' => $username,
				'email' => $email,
				'password' => $user['password'],
				'role' => $role
			);	

			$user = $db->update($data, $id, $stripTags = true);
			

			$this->redirectToRoute('Admin_gestionMembre', ['user'=>$user]);
		}

		$this->show('admin/modifmembres', ['user'=>$user]);
	}

	public function supprimerMembre($id)
	{
		$this->allowTo('1');
		//Je récupère les infos du membre ciblé
		$db = new AdminModel;
		$db->setTable('users');
		$db->setPrimaryKey('id');
		$user = $db->find($id);

		//suppression de la ligne et redirection
		$db->delete($user['id']);
		
		$this->redirectToRoute('Admin_gestionMembre');
	}

	public function gestionMembre()
	{
		$this->allowTo('1');
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('users');

		$membres=$dbAdmin->findAll($orderBy="username", $orderDir="ASC");
		

		$this->show('admin/gestionmembres',['users'=> $membres]);
	}








		
}
