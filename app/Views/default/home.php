<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="container valign-wrapper container-title">
          <div class="row center">
            <h1 class="header header-title center-align valign white-text">Barmiton</h1>
            <h2 class="header header-subtitle col s12 center-align valign">Plus de 1000 recettes de cocktails !</h2>
          </div>
        </div>
        <div class="row center">
          <a href="#" class="btn-floating btn-large waves-effect waves-light transparent"><i class="material-icons md-36">arrow_downward</i></a>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?= $this->assetUrl('img/mojito-champagne.jpg') ?>" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <div class="row center">
              <h3>Choisissez vos ingrédients préférés</h3>
            </div>

          	<form action="cocktails/" method="POST">
              <h5>Alcools</h5>
              <p>
          			<input type="checkbox" name="alcool[]" id="ginId" value="gin">
          			<label for="ginId">Gin</label>
          		</p>
          		<p>
          			<input type="checkbox" name="alcool[]" id="vodkaId" value="vodka">
          			<label for="vodkaId">Vodka</label>
          		</p>
          		<p>
          			<input type="checkbox" name="alcool[]" id="rhumId" value="rum">
          			<label for="rhumId">Rhum</label>
          		</p>
          		<p>
          			<input type="checkbox" name="alcool[]" id="tequilaId" value="tequila">
          			<label for="tequilaId">Tequila</label>
          		</p>
              <p>
                <input type="checkbox" name="alcool[]" id="whiskyId" value="whisky">
                <label for="whiskyId">Tequila</label>
              </p>
          		<h5>Jus de fruits</h5>
              <p>
          			<input type="checkbox" name="juice[]" id="pommeId" value="apple/or/apple-juice/or/apple-juice-fresh-pressed/or/apple-juice-hot">
          			<label for="pommeId">Pomme</label>
          		</p>
              <p>
                <input type="checkbox" name="juice[]" id="orangeId" value="orange-juice">
                <label for="orangeId">Orange</label>
              </p>
              <p>
                <input type="checkbox" name="juice[]" id="citronId" value="lemon-juice/or/lime-juice">
                <label for="citronId">Citron / Citron vert</label>
              </p>
              <p>
                <input type="checkbox" name="juice[]" id="fruitsrougesId" value="cherry-juice/or/cranberry-juice/or/raspberry-juice/or/strawberry-juice">
                <label for="fruitsrougesId">Fruits rouges</label>
              </p>
              <p>
                <input type="checkbox" name="juice[]" id="ananasId" value="pineapple-juice">
                <label for="ananasId">Ananas</label>
              </p>
          		<p>
          			<input type="submit" name="submit" value="mixer">
          		</p>
          	</form>
        </div>
      </div>

    </div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row center">
        <h3>Notre sélection</h3>
       <?php foreach ($cocktailselection as $cocktailcard): ?>
            <div class="col s12 m7 l4">
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


<?php $this->stop('main_content') ?>
