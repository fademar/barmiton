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