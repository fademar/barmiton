<?php $this->layout('layout', ['title' => 'Fiche cocktail']) ?>

<?php $this->start('main_content') ?>

<!-- section de recherche --> 
<section id="fiche">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-6 text-center">
                <h2><?= $dataCocktail['name']?></h2>
                <hr class="glass-primary">
                <h2>Note du cocktail : 

                    <?php 

                    if($dataCocktail["note"] > 0) :
                        echo round($dataCocktail["note"] / $dataCocktail["compteurnote"], PHP_ROUND_HALF_UP) . "/5"; 

                    else :
                        echo "<p> Pas encore de note pour ce cocktail.</p>";
                        
                    endif;

                    ?>
                    
                </h2>

            </div>
        </div>
        <div class="row">
            <div id="" class="col-xs-6 .col-md-6 text-center">
                <img src="<?= $dataCocktail['imgurlmodal']?>">
            </div>
                <h3>Ingrédients</h3>
                    <p><?php

                        foreach($dataCocktail['ingredients'] as $element){
                            echo $element . '<br />';
                        }

                        ?>
                    </p>
                
                <form method="POST">
                   <input type="hidden" name="iddrink" value="<?php echo $dataCocktail['id']; ?>" />
                   <input type="submit" id="confirmFavoris" class="btn btn-primary btn-lg" name="ajouterFavoris" value="Ajouter aux favoris">
                </form>
                <h3>Recette</h3>
                <p><?= $dataCocktail['description']?></p>



                <div class="row">

            

                <div class="rating">

                     <form method="POST">

                      <span class="star-rating">
                        <!-- <input type="hidden" name="compteurnote" value="1"><i></i> -->
                        <input type="hidden" name="iddrink" value="<?php echo $dataCocktail['id']; ?>" />
                        <input type="radio" name="note" value="1"><i></i>
                        <input type="radio" name="note" value="2"><i></i>
                        <input type="radio" name="note" value="3"><i></i>
                        <input type="radio" name="note" value="4"><i></i>
                        <input type="radio" name="note" value="5"><i></i>
                      </span>
                        <span><input type="submit" id="confirmNotation" class="btn btn-primary btn-lg" name="noter" value="Noter"></span>

                     </form>
                </div>
            </div>

        </div>
            
    </div>
</section>





<?php $this->stop('main_content') ?>
