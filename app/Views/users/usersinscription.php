<?php

	if (!empty($_POST)) { // ceci équivaut à if ($_POST)
		//var_dump($_POST);

		// vérification des champs du formulaire :
		// 1- vérification que tous les champs sont remplis :

		foreach($_POST as $key => $value)
		{
			if ($key != 'pseudo' && $key != 'inscription' && empty($value))
			{
				$contenu = '<div class="bg-danger">Veuillez remplir tous les champs !</div>';
			}
		}

		// Si pas d'erreur, on vérifie l'unicité du pseudo avant l'inscription :
		if (empty($contenu))
		{ // si $contenu est vide, c'est qu'il n'y a pas d'erreur
			
			$email=$_POST['email'];
			emailExists($email);

			$username=$_POST['pseudo'];
			usernameExists($username);
			
			if ($membres->rowCount() > 0)
			{ // si la requête retourne 1 enregistrement ou plus, c'est que le pseudo existe
				$contenu .= '<div class="bg-danger">Le pseudo existe, veuillez en choisir un autre !</div>';
			}
			else
			{ // si le pseudo n'existe pas, on peut inscrire le membre
				$_POST['motDePasseId'] = md5($_POST['motDePasseId']); // on crypte le mot de passe avec la fonction md5()
				
				// Retraitement des valeurs de $_POST pour convertir les caractères spéciaux :
				foreach ($_POST as $indice => $valeur)
				{
					$_POST[$indice] = htmlentities($valeur, ENT_QUOTES);
				}
				// Insertion en base :
			executeRequete("INSERT INTO membres (pseudo, nom, prenom, motDePasseId, email,)
							VALUES('$_POST[pseudo]', '$_POST[nom]', '$_POST[prenom]', '$_POST[motDePasseId]', '$_POST[email]')");
				
			$contenu .= '<div class="bg-success">Vous êtes inscrit à notre site. <a href="connexion.php">Cliquez ici pour vous connecter </a></div>';
			}
		}
	}

?>

<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<h2>Inscription</h2>

<form method="POST" action="">

	<label for="nomId">Nom</label>
	<input type="text" id="nomId" name="nomId">

	<label for="PrenomId">Prenom</label>
	<input id="PrenomId" name="Prenom" type="text">

	<label for="motDePasseId">Mot de passe</label>
	<input type="password" id="motDePasseId" name="motDePasseId">

	<label for="emailId">Email</label>
	<input type="email" id="emailId" name="emailId">

	<input type="submit" name="inscription" value="Inscription" class="btn">
</form>

<?php $this->stop('main_content') ?>