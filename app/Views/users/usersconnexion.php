<?php
	// if (isset($_GET['action']) && $_GET['action'] == 'deconnexion')
	// {
	// 	session_destroy(); // supprime la session
	// }

	// Traitement du formulaire de connexion et remplissage de $_SESSION['membre'] :

	if (!empty($_POST))
	{
		$email=$_POST['email'];
		getUserByUsernameOrEmail($email);

	
		// Comparaison du mdp de l'internaute avec celui de la BDD :
		if ($membre['motDePasse'] == md5($_POST['motDePasse']))
		{

			// Vérifie qu'une combinaison d'email/username et mot de passe (en clair) sont présents en bdd et valides
			// Vous devez avoir haché vos mdp avec la fonction password_hash() ou crypt() de votre côté !
			// Retourne l'id de l'utilisateur si valide
			isValidLoginInfo($usernameOrEmail, $plainPassword)

			// Connecte un utilisateur
			// L'argument à passer est un tableau contenant les données utilisateur
			// Les données seront stockées sous la clé 'user' dans $_SESSION
			logUserIn($user)

			// Déconnecte un utilisateur
			logUserOut()

			// Utilise les données utilisateurs présentes en base pour mettre à jour les données en session
			refreshUser()

			// Créer un hash simple d'un mot de passe en utilisant l'algorithme par défaut
			hashPassword($plainPassword)

			// On remplit $_SESSION avec les infos du membre :
			foreach($membre as $indice => $element)
			{
				$_SESSION['membres'][$indice] = $element;
			}
			exit();
		}
	}
?>

<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<form method="POST" action="">
	<label for="emailId">Email</label>
	<input type="email" id="emailId" name="email">

	<label for="motDePasseId">Mot de passe</label>
	<input type="password" id="motDePasseId" name="motDePasse">

	<input type="submit" value="Connexion" class="btn">
</form>

<?php $this->stop('main_content') ?>