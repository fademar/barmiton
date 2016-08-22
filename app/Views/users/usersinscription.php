<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<section>
	<div class="container">
		<div class="row">
			
			<?php if ($showform) : ?>
				
				

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
			<?php endif ?>

			<?php if (!empty($prenom)) : ?>


			<h2>Bonjour <?= $prenom ?>, merci de vous être inscrit !</h2>

			<h3><a data-toggle="modal" href="#connexion">Connectez-vous</a> pour profiter de toutes les fonctionnalités de notre site.</h3>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="connexion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Connectez-vous à votre compte</h2>
                            <hr class="star-primary">
                            <form method="POST" action="../Users/connexion/">

                                <div class="form-group">
                                    <label for="emailId">Email</label>
                                    <input class="form-control" type="email" id="emailId" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="motDePasseId">Mot de passe</label>
                                    <input class="form-control" type="password" id="motDePasseId" name="motDePasse" required>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="submit" name="connexion" value="Connexion" class="btn">
                                </div>
                                <input type="hidden" name="url" value="<?= $_SERVER['REDIRECT_URL'] ?>" >
                            </form>                

                           <p>Pas encore de compte, <a href="<?= $this->url('Users_UsersInscription') ?>">inscrivez-vous</a> !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php endif ?>

		</div>
	</div>
</section>

<?php $this->stop('main_content') ?>