<?php
namespace Model\users;

class usersModel extends \W\Model\users
{
	public function getInscription($idMembreInscrit)
	{
		$inscription = $this->find($idMembreInscrit);

		$utilisateur = new Membre (
			$inscription['id_membre'],
			$inscription['pseudo'],
			$inscription['nom'],
			$inscription['prenom'],
			$inscription['motDePasse'],
			$inscription['email']
		);
		
		return $utilisateur;
	}
}