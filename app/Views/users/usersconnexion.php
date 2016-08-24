<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<header>
    <div class="container">
        <div class="row center">
            <h2 class="text-center">Connexion</h2>
		</div>
	</div>
</header>

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                    
                	<form method="POST" action="">

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

					</form>                
                
                
            </div>
        </div>
    </div>
</section>



<?php $this->stop('main_content') ?>