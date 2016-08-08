<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<div class="section">

		<!--   Icon Section   -->
		<div class="row">
				<div class="row">
					<div class="col s12">
						<div class="row center">
							<h2>Recherche avancée</h2>
							
							<form action="" method="POST">
								
								<div class="input-field col s12 l12">
								    <label>Nom</label>
								    <input type="text" id="recherchenom" name="nomcocktail">
								</div>


								<div class="input-field col s12 l3">
								    <label>Couleur</label>
								    <select class="browser-default">
								    	<option value="" disabled selected></option>
								    	<?php foreach($listeCouleurs as $couleur) : ?> 	
								     		<option value="<?php echo $couleur['color']?>"><?php echo $couleur['couleur']?></option>
								    	<?php endforeach ?>
								    </select>
								</div>

								<div class="input-field col s12 l3">
								    <label>Goût</label>
								    <select class="browser-default">
								    	<option value="" disabled selected></option>
								    	<?php foreach($listeGouts as $gout) : ?> 	
								     		<option value="<?php echo $gout['taste']?>"><?php echo $gout['gout']?></option>
								    	<?php endforeach ?>
								    </select>
								</div>
							
								<div class="input-field col s12 l3">
								    <label>Difficulté</label>
								    <select class="browser-default">
								    	<option value="" disabled selected></option>
								    	<?php foreach($listeDifficultes as $difficulte) : ?> 	
								     		<option value="<?php echo $difficulte['skill']?>"><?php echo $difficulte['difficulte']?></option>
								    	<?php endforeach ?>
								    </select>
								</div>
								
								<div class="input-field col s12 l3">
								    <label>Occasions</label>
								    <select class="browser-default">
								    	<option value="" disabled selected></option>
								    	<?php foreach($listeOccasions as $occasion) : ?> 	
								     		<option value="<?php echo $occasion['occasionuk']?>"><?php echo $occasion['occasionfr']?></option>
								    	<?php endforeach ?>
								    </select>
								</div>

								
							</form>

						</div>
					</div>
				</div>
		</div>
	</div>
</div>

<?php $this->stop('main_content') ?>