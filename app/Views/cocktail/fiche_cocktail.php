<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>
  
   <div id="test" class="row">
        <div class="col s12 m5">
          <div class="card">
            <div class="card-image">
              <img id="gg" src="http://assets.absolutdrinks.com/drinks/solid-background-black/soft-shadow/floor-reflection/415x655/golden-gleam(85).jpg">
              <span class="card-title"><?= $dataCocktail[0]['name']?></span>
            </div>
            <div class="card-content">
              <p><?= $dataCocktail[0]['description']?></p>
            </div>
            <div class="card-action">
              <a href="#">Ajouter aux favoris</a>
            </div>
          </div>
        </div>
        <div class="row">
        <div id="test2" class="col s12 m5">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Recette</span>
            <p>Remplissez un verre à mélanger avec des glaçons. <br> Ajouter tous les ingrédients. <br> Mélangez et verser dans un verre à cocktail froid.</p>
            </div>
            <div class="card-action">
              <div class="rating">
              <a href="#">Partagez</a>
              <a href="#">Notez</a>

              <a href="#"><i class="tiny material-icons" id="1etoile">star</i></a>
              <a href="#"><i class="tiny material-icons" id="2etoile">star</i></a>
              <a href="#"><i class="tiny material-icons" id="3etoile">star</i></a>
              <a href="#"><i class="tiny material-icons" id="4etoile">star</i></a>
              <a href="#"><i class="tiny material-icons" id="5etoile">star</i></a>
</div>
            </div>
          </div>
        </div>
      </div>
      </div>


<?php $this->stop('main_content') ?>
