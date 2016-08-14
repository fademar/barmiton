<?php $this->layout('layout', ['title' => 'Cocktails']) ?>

<?php $this->start('main_content') ?>
  
<div id="test" class="row">
    <h1 id="h1FicheCocktail">Cocktail <?= $dataCocktail['name']?></h1>
    <div class="col s12 m5">
        <div class="card">
            <div class="card-image">
                <img src="<?= $dataCocktail['imgurlsmall']?>"></a>
                <span id="imageCocktail" class="card-title"><?= $dataCocktail['name']?></span>
            </div>
            <div class="card-content">
                <h3>Ingrédients</h3>
                <p><?php

                    foreach($dataCocktail['ingredients'] as $element){
                      echo $element . '<br />';
                  }

                  ?></p>
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
                    <p><?= $dataCocktail['description']?></p>
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
