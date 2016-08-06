<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>
	
	<div class="container">
	    <div class="section">

	      	<!--   Icon Section   -->
	     	<div class="row">
	     		<?= $error; ?>
			
				<?php if (!empty($cocktaillist)): ?>
					<?php foreach ($cocktaillist as $cocktailcard): ?>
						<div class="col s12 m7 l3">
				          <div class="card hoverable">
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
						    	<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
						    </div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>





<?php $this->stop('main_content') ?>