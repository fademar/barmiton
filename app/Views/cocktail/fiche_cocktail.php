<?php $this->layout('layout', ['title' => 'Fiche cocktail']) ?>

<?php $this->start('main_content') ?>


<!-- section de recherche -->
<section id="fiche">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Cocktail <?= $dataCocktail['name']?></h2>
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
                <a href="#">Ajouter aux favoris</a>
                <span>Recette</span>
                <p><?= $dataCocktail['description']?></p>
            </div>
            <div class="row">

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
</section>





<?php $this->stop('main_content') ?>
