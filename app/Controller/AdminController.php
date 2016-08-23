<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Admin\AdminModel;
use Model\Cocktails\CocktailsModel;

class AdminController extends Controller
{

	private $_admin;
	private $_cocktaildata;


	public function admin()
	{
		$_admin = new AdminModel();
		$_updates = $_admin->getLastUpdates();
		$_cocktaildata = array();

		$this->show('admin/admin', [
												'updates' => $_updates,
		
											]);
	




	}


	public function admincocktails()
	{
		

		if ($_POST) {
			

			$_cocktaildb = new CocktailsModel();
			$_cocktaildb->setTable('cocktails');
			$_cocktaildata = $_cocktaildb->search(['idCocktailApi' => $_POST['idcocktail']]);


			$_recettedb = new RecettesModel();
			$_recettedb->setTable('recettes');



			$this->show('admin/modifcocktail', [
												'cocktaildata' => $_cocktaildata[0]
											]);


			}


		

	}




}