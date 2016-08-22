<?php $this->layout('layout', ['title' => 'Fiche cocktail']) ?>

<?php $this->start('main_content') ?>


<section>
    <div class="container">
        <div class="row">
			<h2>Bonjour <?= $prenom ?>, merci de vous être inscrit !</h2>

			<h3><a data-toggle="modal" href="#connexion">Connectez-vous</a> pour profiter de toutes les fonctionnalités de notre site.</h3>

        </div>
    </div>
</section>

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











<?php $this->stop('main_content') ?>











