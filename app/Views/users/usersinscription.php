<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<h2>Inscription</h2>

<form method="POST" action="">

	<div class="form-group">
		<label for="nomId">Nom</label>
		<input class="form-control" type="text" id="nomId" name="nom" placeholder="Votre Nom" required>
	</div>

	<div class="form-group">
		<label for="prenomId">Prenom</label>
		<input class="form-control" id="prenomId" name="prenom" type="text" placeholder="Votre Prenom" required>
	</div>

	<div class="form-group">
		<label for="usernameId">Pseudo</label>
		<input class="form-control" id="usernameId" name="username" type="text" placeholder="Votre Pseudo" required>
	</div>

	<div class="form-group">
		<label for="motDePasseId">Mot de passe</label>
		<input class="form-control" type="password" id="motDePasseId" name="motDePasse" placeholder="Votre Mot de passe" required>
	</div>

	<div class="form-group">
		<label for="confirmMotDePasseId">Confirmation mot de passe</label>
		<input class="form-control" type="password" id="confirmMotDePasseId" name="confirmMotDePasse" placeholder="Confirmer Mot de passe" required>
	</div>

	<div class="form-group">
		<label for="dateNaissanceId">Date de naissance</label>
		<input class="form-control" id="dateNaissanceId" name="dateNaissance" type="date" placeholder="Votre Date de naissance" required>
	</div>

	<div class="form-group">
		<label for="emailId">Email</label>
		<input class="form-control" type="email" id="emailId" name="email" placeholder="Votre adresse mail" required>
	</div>

	<div class="form-group">
		<input class="form-control" type="submit" name="inscription" value="Inscription">
	</div>

</form>

<?php $this->stop('main_content') ?>