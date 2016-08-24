<?php $this->layout('layout', ['title' => 'Nous contacter']) ?>

<?php $this->start('main_content') ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md12 text-center">
				<h2>Nous contacter</h2>

				<form method="POST" action="">

					<div class="form-group">
						<label for="usernameId">Pseudo</label>
						<input class="form-control" id="usernameId" name="username" type="text" placeholder="Votre Pseudo" required>
					</div>

					<div class="form-group">
						<label for="emailId">Email</label>
						<input class="form-control" type="email" id="emailId" name="email" placeholder="Votre adresse mail" required>
					</div>

					<div class="form-group">
						<label for="sujetId">Sujet</label>
						<select class="form-control" name="sujet" id="sujetId" required>
								<option value="" selected>---</option>
								<option value="Profil">Profil</option>
								<option value="Cocktails">Cocktails</option>
								<option value="Autres">Autres</option>
							</select>
						</div>

						<div class="form-group">
							<label for="messageId"></label>
							<textarea class="form-control" name="message" id="messageId" row="10" placeholder="Votre message" required></textarea>
						</div>

						<div class="form-group">
							<input class="form-control" type="submit" value="Envoyer">
						</div>

					</form>
				</div>
			</div>
		</div>

		<?php $this->stop('main_content') ?>