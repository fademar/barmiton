<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center white-text">Barmiton</h1>
        <div class="row center">
          <h5 class="header col s12 light">Plus de 1000 recettes de cocktails !</h5>
        </div>
        <div class="row center">
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Mixez</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="<?= $this->assetUrl('img/mojito.jpeg') ?>" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
          	<form action="cocktails/" method="POST">
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
          			<label for="whiskyId">Whisky</label>
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
