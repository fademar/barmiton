<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<h2>Inscription</h2>

<form method="POST">

	<label for="nomId">Nom</label>
	<input type="text" id="nomId" name="nom" required>

	<label for="prenomId">Prenom</label>
	<input id="prenomId" name="prenom" type="text" required>

	<label for="usernameId">Pseudo</label>
	<input id="usernameId" name="username" type="text" required>

	<label for="dateNaissanceId">Date de naissance</label>
	<input id="dateNaissanceId" name="dateNaissance" type="date" required>

	<label for="motDePasseId">Mot de passe</label>
	<input type="password" id="motDePasseId" name="motDePasse" required>

	<label for="emailId">Email</label>
	<input type="email" id="emailId" name="email" required>

	<input type="submit" name="inscription" value="Inscription" class="btn">
</form>

<?php $this->stop('main_content') ?>