<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<section>
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 col-md-12">
				
				
			<?php if ($showform) : ?>
                    <h2 class="text-center">Renseignez ces informations pour vous inscrire</h2>
                    <hr class="pencil-primary">
				<div class="col-md-6 col-md-offset-3">
					
					<?php if (!empty($error)) : ?>
						<?php foreach ($error as $message) : ?>
							<div class="alert alert-danger" role="alert"><?= $message ?></div>
						<?php endforeach ?>

					<?php endif ?>


					<form method="POST" action="">

						<div class="form-group">
							<label for="usernameId">Pseudo</label>
							<input class="form-control" id="usernameId" name="username" type="text" value="<?= $pseudo?>" placeholder="Votre Pseudo" required>
						</div>

						<div class="form-group">
							<label for="emailId">Email</label>
							<input class="form-control" type="email" id="emailId" name="email" value="<?= $email?>" placeholder="Votre adresse mail" required>
						</div>
						
						<div class="form-group">
							<label for="motDePasseId">Mot de passe</label>
							<input class="form-control" type="password" id="motDePasseId" name="motDePasse" value="<?= $password?>" placeholder="Votre Mot de passe" required>
						</div>

						<div class="form-group">
							<label for="confirmMotDePasseId">Confirmation mot de passe</label>
							<input class="form-control" type="password" id="confirmMotDePasseId" name="confirmMotDePasse" value="<?= $confirmPassword?>" placeholder="Confirmer Mot de passe" required>
						</div>

						<div class="form-group">
							<label for="nomId">Nom</label>
							<input class="form-control" type="text" id="nomId" name="nom" placeholder="Votre Nom" value="<?= $nom ?>" required>
						</div>

						<div class="form-group">
							<label for="prenomId">Prenom</label>
							<input class="form-control" id="prenomId" name="prenom" type="text" value="<?= $prenom ?>" placeholder="Votre Prenom" required>
						</div>



						<div class="form-group">
							<label for="dateNaissanceId">Date de naissance</label>
							<input class="form-control" id="dateNaissanceId" name="dateNaissance" type="date" value="<?= $dateNaissance?>" placeholder="JJ/MM/AAAA" required>
						</div>


						<div class="form-group text-center">
							<button class="btn btn-primary" name="inscription">S'inscrire</button>
						</div>

					</form>
				</div>
			<?php endif ?>

			<?php if (!empty($prenom) && (empty($error))) : ?>


				<h2 class="text-center">Bonjour <?= $prenom ?>, merci de vous être inscrit !</h2>

				<h3 class="text-center"><a data-toggle="modal" href="#connexion">Connectez-vous</a> pour profiter de toutes les fonctionnalités de notre site.</h3>
			<?php endif ?>

		</div>
		<!-- Modal -->
		<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body text-center">
						<h2>Connectez-vous à votre compte</h2>
						<hr class="star-primary">
						<form method="POST" action="../connexion/">

							<div class="form-group text-center">
								<label for="emailId">Email</label>
								<input class="form-control" type="email" id="emailId" name="email" required>
							</div>

							<div class="form-group text-center">
								<label for="motDePasseId">Mot de passe</label>
								<input class="form-control" type="password" id="motDePasseId" name="motDePasse" required>
							</div>


							<p>Pas encore de compte, <a href="<?= $this->url('Users_UsersInscription') ?>">inscrivez-vous</a> !</p>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
								<input type="submit" class="btn btn-primary" name="connexion" value="Connexion">
								<input type="hidden" name="url" value="<?= $_SERVER['REDIRECT_URL'] ?>" >

							</div>
						</div>
					</form>                
			</div>
		</div>
	</div>


		</div>
	</div>
</section>

<?php $this->stop('main_content') ?>