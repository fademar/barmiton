<?php
namespace Model\users;

class users
{
	
	//Définition de mes propriétés
		private $_id_membre
		//--
		private $_pseudo;
		private $_nom;
		private $_prenom;
		//--
		private $_motDePasse;
		private $_email;
		
	//Mise en place de mon constructeur
	public function __construct(
		$id_membre
		$pseudo,
		$nom,
		$prenom,
		$motDePasse,
		$email
		)

		{
			$this->_id_membre		= $id_membre

			$this->_pseudo			= $pseudo;
			$this->_nom				= $nom;
			$this->_prenom			= $prenom;

			$this->_motDePasse		= $motDePasse;
			$this->_email			= $email;
		}
		
	//Mise en place des getters
	public function getIdMembre()
	{
		return $this->_id_membre;
	}

	public function getPseudo()
	{
		return $this->_pseudo;
	}

	public function getNom()
	{
		return $this->_nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function getMotDePasse()
	{
		return $this->_motDePasse;
	}

	public function getEmail()
	{
		return $this->_email;
	}


	public function setIdMembre()
	{
		$this->_id_membre = $id_membre;
	}

	public function setPseudo()
	{
		$this->_pseudo = $pseudo;
	}

		public function setNom()
	{
		$this->_nom = $nom;
	}

		public function setPrenom()
	{
		$this->_prenom = $prenom;
	}

		public function setMotDePasse()
	{
		$this->_motDePasse = $motDePasse;
	}

		public function setEmail()
	{
		$this->_email = $email;
	}
}