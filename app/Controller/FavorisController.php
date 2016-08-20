<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Favoris\FavorisModel;
use Model\Cocktails\CocktailsModel;
use Model\Users\UsersModel;

class FavorisController extends Controller
{


	public function showFavoris() {

		$loggedUser = $this->getUser();

		$favorisdb = new FavorisModel();
		$favorisdb->setTable('favoris');
		$favorisdb->setPrimaryKey('idFavoris');

		if ($_POST) {

			$favorisdb->delete($_POST['supprimer']);

		}

		$favorisuser = $favorisdb->search(['idMembres' => $loggedUser['id']]);

		foreach ($favorisuser as $cocktailfavoris) {

			$cocktaildb = new CocktailsModel();
			$favoris = $cocktaildb->getcocktaildata($cocktailfavoris['iddrink']);

			$favorislist[] = ['idfavoris' => $cocktailfavoris['idFavoris'], 'favorisdata' => $favoris];
			

		}

		$this->show('users/favoris', [
										'favorislist' 	=> $favorislist
									 ]);
	}






}

