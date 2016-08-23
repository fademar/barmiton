<?php $this->layout('layout', ['title' => 'Changer votre pseudo']) ?>

<?php $this->start('main_content') ?>
<section>
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 col-md-12">
				
				<h2 class="text-center">Changer votre mot de passe :</h2>

				<form method="POST" action="">

					<div class="form-group">
						<label for="newMotDePasseId">Nouveau mot de passe</label>
						<input type="password" class="form-control" id="newMotDePasseId" name="newMotDePasse" placeholder="Nouveau mot de passe" required>
					</div>

					<div class="form-group">
						<label for="confirmNewMotDePasseId">Confirmation nouveau mot de passe</label>
						<input type="password" class="form-control" id="confirmNewMotDePasseId" name="confirmNewMotDePasse" placeholder="Confirmation nouveau mot de passe" required>
					</div>
					
					<button type="submit" class="btn btn-default">Confirmer</button>

				</form>

			</div>
		</div>
	</div>
</section>

<?php $this->stop('main_content') ?>