<div class="col-xs-12 col-md-4">
                        <label for="difficultesId">Difficultés</label>
                        <select id="difficultesId" name="difficultes" class="form-control selectpicker" title="Choisissez une option"> 
                            <?php foreach($form['difficultes'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
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





	<option value="<?php echo $couleur['color']?>"><?php echo $couleur['couleur']?></option>



	// /**************** Récupération des données ******************/
		// if (($param === 'tout') && ($valeur === 'tout')) {

		// 	$_jsonurl = 'https://addb.absolutdrinks.com/drinks/?apiKey=2c758736e5f844bdb9d39308df889c6d';
		// 	$_json = file_get_contents($_jsonurl);
		// 	$_data = json_decode($_json)->result;

		// 	$selection = $this->getcocktailselection($_data, 6);

		// 	return $selection;
		// }


								<?php foreach($form as $key => $value): ?>
                                    <?php if ($key === 'alcools')?>
                                        <div class="input-field col s12 l4">
                                            <select multiple name="<?= $key ?>";> 
                                                <option value="" selected disabled></option>
                                                <optgroup>
                                                    <option value="gin">Gin</option>
                                                    <option value="rum">Rhum</option>
                                                    <option value="tequila">Tequila</option>
                                                    <option value="vodka">Vodka</option>
                                                    <option value="whisky">Whisky</option>
                                                </optgroup>
                                                <optgroup>
                                                    <?php foreach($value['alcools'] as $champ): ?>     
                                                        <option value="<?php echo $champ['idIngredientApi']?>"><?php echo $champ['nomIngredient']?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                            <label><?= $key?></label>
                                        </div>
                                    <? endif ?>
                                    <?php if ($key === 'softs')?>
                                        <div class="input-field col s12 l4">
                                            <select multiple name="<?= $key ?>";> 
                                                <option value="" selected disabled></option>
                                                    <?php foreach($value['softs'] as $champ): ?>     
                                                        <option value="<?php echo $champ['idIngredientApi']?>"><?php echo $champ['nomIngredient']?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                            <label><?= $key?></label>
                                        </div>
                                    <? endif ?>
                                    <?php if ($key === 'épices')?>
                                        <div class="input-field col s12 l4">
                                            <select multiple name="<?= $key ?>";> 
                                                <option value="" selected disabled></option>
                                                    <?php foreach($value['épices'] as $champ): ?>     
                                                        <option value="<?php echo $champ['idIngredientApi']?>"><?php echo $champ['nomIngredient']?></option>
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                            <label><?= $key?></label>
                                        </div>
                                    <? endif ?>
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