<?php

namespace Controller;

use \W\Controller\Controller;
use Model\Outils\OutilsModel;

class OutilsController extends Controller
{
	

	public function showOutils() {

		$outilsdb = new OutilsModel();
		$outils = $outilsdb->getOutils();


		$this->show('outils/outils', ['outils' => $outils]);
		
	}


	public function showFicheOutil($id) {

		$outilsdb = new OutilsModel();
		$outilsdb->setTable('outils');
		$outil = $outilsdb->search(['idapi' => $id]);


		$this->show('outils/fiche_outil', ['outil' => $outil[0]]);
		
	}













}