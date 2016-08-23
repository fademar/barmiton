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

	public function updatecocktail($id) {


		$_cocktaildb = new CocktailsModel();
		$_cocktaildb->setTable('cocktails');
		$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $id]);

		$_recettedb = new RecettesModel();
		$_recettedb->setTable('recettes');
		$_recettedata = $_recettedb->search(['idcocktail' => $id]);

		if ($_POST) {
			var_dump($_POST);
			// $_cocktaildb->update(
			// 						['description' => $_POST['description']], 
			// 						['note' => $_POST['note']],
			// 						['compteurnote' => $_POST['compteurnote']],
			// 						$_POST['id'], $stripTags = true);

			foreach ($_POST['recettetextes'] as $key => $value) {
			 	
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



}