<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<form method="POST">

	<label for="emailId">Email</label>
	<input type="email" id="emailId" name="email" required>

	<label for="motDePasseId">Mot de passe</label>
	<input type="password" id="motDePasseId" name="motDePasse" required>

	<input type="submit" value="Connexion" class="btn">

</form>

<?php $this->stop('main_content') ?>