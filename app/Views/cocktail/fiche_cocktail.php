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
              
              <form method="POST">
                <input type="hidden" name="iddrink" value="<?php echo $idDrink; ?>" />
                <input type="submit" name="ajouterFavoris" value="Ajouter aux favoris">
              </form>

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

              <form method="POST">

              <span class="star-rating">
                <input type="radio" name="note" value="1"><i></i>
                <input type="radio" name="note" value="2"><i></i>
                <input type="radio" name="note" value="3"><i></i>
                <input type="radio" name="note" value="4"><i></i>
                <input type="radio" name="note" value="5"><i></i>
              </span>
                <input type="submit" name="noter" value="noter">

              </form>
              <strong class="choice">Choose a rating</strong>







</div>
            </div>
          </div>
        </div>
      </div>
      </div>
              


<?php $this->stop('main_content') ?>
