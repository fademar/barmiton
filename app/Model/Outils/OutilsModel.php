<?php 

namespace Model\Outils;

use Model\Traductions\TraductionsModel;


class OutilsModel extends \W\Model\Model 
{

	public function chargeDb() {

		$this->setTable('outils');

		/**************** Récupération des données ******************/
		$_jsonurl = 'https://addb.absolutdrinks.com/tools/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		$_json = file_get_contents($_jsonurl);
		$_data = json_decode($_json)->result;


		/**************** Traduction et Insertion en bdd ******************/

		foreach ($_data as $outil) {
			

			$traduction = new TraductionsModel();
			
			$descriptionfr = $traduction->getTrad($outil->description);			

			if (!empty($outil->videos[0]->video)) {
				$video = $outil->videos[0]->video;
			}
			else {
				$video = 'pas-de-video';
			}


			$this->insert([
								'idapi' 		=> $outil->id,
								'nom' 			=> $outil->name,
								'description' 	=> $descriptionfr,
								'video'			=> $video,
								'langue'		=> 'en'

						  ], $stripTags = true);


		}

		
	}


	public function getOutils() {

		$this->setTable('outils');
		$dbexist = $this->find('1');

		if (empty($dbexist)) {		
			$this->chargeDb();
			$datadb = "";
		}
		else {

			$datadb = $this->findAll();

		}

		return $datadb;

	}











}