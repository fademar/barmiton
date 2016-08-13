<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>

<!-- Header -->
        <div id="advancesearch" class="container">
            <div class="row">
                <form action="../recherche/" method="POST" id="formFiltres" class="formulaire">
                                
                                <div class="form-group">
                                    <input type="text" id="autocomplete-name" class="form-control">
                                    <label for="autocomplete-name">Nom du cocktail</label>
                                </div>
                                
                                <div class="input-field col s12 l3">
                                    <select name="alcoolsprincipaux[]" multiple>
                                        <option value="" disabled selected></option>
                                        <option value="gin">gin</option>
                                        <option value="rum">rhum</option>
                                        <option value="tequila">tequila</option>
                                        <option value="vodka">vodka</option>
                                        <option value="whisky">whisky</option>
                                    </select>
                                    <label>alcools principaux</label>
                                </div>

                                <?php foreach($form as $key => $value): ?>
                                    <?php if ($key === 'alcools' || $key === 'softs' || $key === 'épices'): ?>                                          
                                        <div class="input-field col s12 l3">
                                            <select multiple name="<?= $key ?>[]";> 
                                                <option value="" selected disabled></option>
                                                    
                                                    <?php foreach($value as $champ): ?>     
                                                        <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
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
                                                <option value="<?php echo $champ['champuk'];?>"><?php echo (mb_strtolower($champ['champfr'])); ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <label><?= $key?></label>
                                    </div>
                                    <?php endif ?>
                                <?php endforeach ?>
                                
                                <button class="btn waves-effect waves-light" type="submit" name="mixer">Mixer !</button>
                            </form>
            </div>
        </div>




<div class="container">
	<div class="section">

		<!--   Icon Section   -->
		<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="row center">
							<h2>Recherche avancée</h2>
                            


                            <!-- Formulaire de recherche -->

 
                            

                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
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
                            <a href="<?= $cocktailcard['id']?>"><img src="<?= $cocktailcard['imgurlsmall']?>"></a>
                        </div>
                        <div class="card-action">
                            <div class="card-title grey-text text-darken-4 center-align"><?= $cocktailcard['name']?></div>
                            <!-- Modal Trigger -->
                            <div class="center-align margin-top-20"><button class="btn-floating waves-effect waves-light blue-grey lighten-4" data-target="modal-<?= $cocktailcard['id']?>"><i class="material-icons">add</i></button></div>
                        </div>
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
                            <a href="<?= $cocktailcard['id']?>"><img src="<?= $cocktailcard['imgurlsmall']?>"></a>
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
                            <a href="<?= $cocktailcard['id']?>"><img src="<?= $cocktailcard['imgurlsmall']?>"></a>
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