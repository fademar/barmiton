<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>

<form method="POST">

	<div class="form-group">
		<label for="emailId">Email</label>
		<input class="form-control" type="email" id="emailId" name="email" required>
	</div>

	<div class="form-group">
		<label for="motDePasseId">Mot de passe</label>
		<input class="form-control" type="password" id="motDePasseId" name="motDePasse" required>
	</div>

	<div class="form-group">
		<input class="form-control" type="submit" name="inscription" value="Inscription" class="btn">
	</div>

</form>

<?php $this->stop('main_content') ?>