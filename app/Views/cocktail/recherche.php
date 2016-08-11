<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<div class="section">

		<!--   Icon Section   -->
		<div class="row">
				<div class="row">
					<div class="col s12">
						<div class="row center">
							<h2>Nouvelle recherche</h2>
							
                            <!-- Formulaire de recherche -->

							<form action="../recherche/" method="GET">
								
								<!-- <div class="input-field col s12 l12">
								    <label>Nom</label>
								    <input type="text" id="recherchenom" name="nomcocktail">
								</div> -->
								
                                <div class="input-field col s12 l3">
                                    <select name="alcoolsprincipaux[]" multiple>
                                        <option value="" disabled selected></option>
                                        <option value="gin">Gin</option>
                                        <option value="rum">Rhum</option>
                                        <option value="tequila">Tequila</option>
                                        <option value="vodka">Vodka</option>
                                        <option value="whisky">Whisky</option>
                                    </select>
                                    <label>alcools principaux</label>
                                </div>

                                <?php foreach($form as $key => $value): ?>
                                    <?php if ($key === 'alcools' || $key === 'softs' || $key === 'épices'): ?>                                          
                                        <div class="input-field col s12 l3">
                                            <select multiple name="<?= $key ?>[]";> 
                                                <option value="" selected disabled></option>
                                                    
                                                    <?php foreach($value as $champ): ?>     
                                                        <option value="<?php echo $champ['idIngredientApi']?>"><?php echo $champ['nomIngredient']?></option>
                                                    <?php endforeach ?>
                                            </select>
                                            <label><?php if ($key === 'alcools') {echo "autres alcools/liqueurs";} else {echo $key;} ?></label>
                                        </div>
                                    <?php endif ?>

                                    <?php if ($key === 'couleurs' || $key === 'difficultes' || $key === 'gouts' || $key === 'occasions'): ?>
                                    <div class="input-field col s12 l3">
                                        <select <?php if (($key === 'couleurs') || ($key === 'difficultes')) {echo 'name="'. $key .'"';} else {echo 'multiple name="'. $key .'[]"';}?>> 
                                            <option value="" selected <?php if (($key === 'gouts') || ($key === 'occasions')) {echo 'disabled';} ?>></option>
                                            <?php foreach($value as $champ): ?>     
                                                <option value="<?php echo $champ['champuk']?>"><?php echo $champ['champfr']?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <label><?= $key?></label>
                                    </div>
                                    <?php endif ?>
                                <?php endforeach ?>
								
                                <button class="btn waves-effect waves-light" type="submit">Mixer !</button>
							</form>

						</div>
					</div>
				</div>
		</div>
	</div>


	<div class="section">

		<!--   Icon Section   -->
		<div class="row">
			<?= $error; ?>
			<?php if (!empty($cocktaillist)): ?>
				<div class="row">
					<div class="col s12">
						<div class="row center">
							<h2>Résultats de recherche</h2>
						</div>
					</div>
				</div>
				<?php foreach ($cocktaillist as $cocktailcard): ?>
					<div class="col s12 m7 l3">
						<div class="card">
							<div class="card-image">
								<img src="<?= $cocktailcard['imgurlsmall']?>">
							</div>
							<div class="card-action">
								<div class="card-title grey-text text-darken-4 center-align"><?= $cocktailcard['name']?></div>
								<!-- Modal Trigger -->
								<div class="center-align margin-top-20"><button class="btn-floating waves-effect waves-light blue-grey lighten-4 modal-trigger" data-target="modal-<?= $cocktailcard['id']?>"><i class="material-icons">add</i></button></div>
							</div>
						</div>
					</div>
					<!-- Modal Structure -->
					<div id="modal-<?= $cocktailcard['id']?>" class="modal">
						<div class="modal-content">
							<h4><?= $cocktailcard['name']?></h4>
							<div>
								<p><?= $cocktailcard['description']?></p>
							</div>
							<div>
								<img src="<?= $cocktailcard['imgurlmodal']?>">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#!" class="modal-action modal-close red btn-flat">Fermer</a>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>

		</div>
	</div>
</div>





<?php $this->stop('main_content') ?>