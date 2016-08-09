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
								
								<?php foreach($form as $key => $value): ?>
									<div class="input-field col s12 l3">
									    <label><?= $key?></label>
										<select class="browser-default" name="couleur">
									    	<option value="" disabled selected></option>
									    	<?php foreach($value as $champ): ?> 	
									     		<option value="<?php echo $champ['champuk']?>"><?php echo $champ['champfr']?></option>
									    	<?php endforeach ?>
								    	</select>
									</div>
								<?php endforeach ?>
								
							</form>

						</div>
					</div>
				</div>
		</div>
	</div>

	<!-- Sélection de cocktails les mieux notés -->
 	<div class="section">
        <div class="row center">
            <h2>Nos utilisateurs ont aimé</h2>
            <?php foreach ($cocktailbest as $cocktailcard): ?>
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
        </div>
	</div>

	<!-- Sélection de cocktails du moment -->
 	<div class="section">
        <div class="row center">
            <h2>Un cocktail pour <?= $nommoment ?> ?</h2>
            <?php foreach ($cocktailsoccasion as $cocktailcard): ?>
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
        </div>
	</div>


	<!-- Sélection des cocktails par couleur -->
    <div class="section">
        <div class="row center">
            <h2>Vous aimez le <?= $nomcouleur ?> ?</h2>
            <?php foreach ($cocktailscouleur as $cocktailcard): ?>
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
        </div>
    </div>
</div>





</div>

<?php $this->stop('main_content') ?>