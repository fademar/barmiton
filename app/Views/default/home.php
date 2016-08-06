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

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


<?php $this->stop('main_content') ?>
