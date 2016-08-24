<?php $this->layout('layoutadmin2', ['title' => 'Modification des membres']) ?>

<?php $this->start('main_content') ?>

<div class="container">
<section>
		<div class="col-md-12">
			<h2 class="text-center">Formulaire de modification des membres</h2>
			<div class="col-md-6 col-md-offset-3">
				<form method="POST"> 

					<div class="form-group">
						<label for="pseudo">Pseudo</label>
						<input type="text" name="username" id="pseudo" class="form-control" value="<?php echo $user['username']?>">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']?>">
					</div>

					<div class="form-group">
						<label for="role">Role</label>
						<select class="form-control" name="role" id="role">
							<option value="0" <?php if ($user['role'] == 0){ echo 'selected';} ?>">Membre</option> 
							<option value="1" <?php if ($user['role'] == 1){ echo 'selected';} ?>>Admin</option>
						</select>
					</div>

					<input type="submit" name="modifier" class="form-control" value="Modifier">
				</form>
			</div>
		</div>
	<section>
</div>

<?php $this->stop('main_content') ?>