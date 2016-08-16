<?php $this->layout('layout', ['title' => 'Fiche cocktail']) ?>

<?php $this->start('main_content') ?>

<!-- section de recherche --> 
<section id="fiche">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2><?= $dataCocktail['name']?></h2>
                <hr class="glass-primary">
            </div>
        </div>
        <div class="row">
            <div id="" class="col-xs-12 .col-md-12 text-center">
                <img src="<?= $dataCocktail['imgurlmodal']?>"></a>
            </div>
            <h3>Ingrédients</h3>
            <p><?php

                foreach($dataCocktail['ingredients'] as $element){
                    echo $element . '<br />';
                }

                ?></p>
                 <form method="POST">
                <input type="hidden" name="iddrink" value="<?php echo $idDrink; ?>" />
                <input type="submit" name="ajouterFavoris" value="Ajouter aux favoris">
              </form>
                <span>Recette</span>
                <p><?= $dataCocktail['description']?></p>
            </div>
            <div class="row">

            

                <div class="rating">
                    <a href="#">Partagez</a>
                    <a href="#">Notez</a>

                     <form method="POST">

                      <span class="star-rating">
                        <!-- <input type="hidden" name="compteurnote" value="1"><i></i> -->
                        <input type="radio" name="note" value="1"><i></i>
                        <input type="radio" name="note" value="2"><i></i>
                        <input type="radio" name="note" value="3"><i></i>
                        <input type="radio" name="note" value="4"><i></i>
                        <input type="radio" name="note" value="5"><i></i>
                      </span>
                        <input type="submit" name="noter" value="Noter">

                     </form>
                </div>
            </div>
    </div>
</section>





<?php $this->stop('main_content') ?>
