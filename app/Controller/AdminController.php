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
		$_admin = new AdminModel();
		$_updates = $_admin->getLastUpdates();
		$_cocktaildata = array();

		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['langue' => 'en'], $operator = 'AND');
		
		foreach ($_recettedata as $recette) {
			
			$listrecettes[] = array('id' => $recette['id'], 'idcocktail' => $recette['idcocktail']); 

		}


		$this->show('admin/admin', [
												'updates' 		=> $_updates,
												'listrecettes' 	=> $listrecettes
											]);

	}


	public function admincocktails() {
		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['langue' => 'en'], $operator = 'AND');
		
		foreach ($_recettedata as $recette) {
			
			$listrecettes[] = array('id' => $recette['id'], 'idcocktail' => $recette['idcocktail']); 

		}

		$this->show('admin/adminupdates', [
												'listrecettes' 	=> $listrecettes
											]);



	}

	public function updatecocktail($idcocktail) {


		$_cocktaildb = new CocktailsModel();
		$_cocktaildb->setTable('cocktails');
		$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $idcocktail]);

		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['idcocktail' => $idcocktail]);

		if ($_POST) {
			$_cocktaildb->update(
									['description' => $_POST['description']], 
									['note' => $_POST['note']],
									['compteurnote' => $_POST['compteurnote']],
									$_POST['iddb'], $stripTags = true);

			foreach ($_POST['recettetextes'] as $key => $value) {
			 	var_dump($_POST['recetteiddb']);
				var_dump($key);
				var_dump($value);
			} 

			foreach ($_POST['recettedescriptions'] as $key => $value) {
			 	
				var_dump($key);
				var_dump($value);


			} 

		}


		$this->show('admin/modifcocktail', [
												'cocktaildata' 	=> $_cocktaildata[0],
												'recettedata'	=> $_recettedata

											]);


	}

	public function modifierMembre($id)
	{
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
		$dbAdmin= new AdminModel;
		$dbAdmin->setTable('users');

		$membres=$dbAdmin->findAll($orderBy="username", $orderDir="ASC");
		

		$this->show('admin/gestionmembres',['users'=> $membres]);
	}








		
}
