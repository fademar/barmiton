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

                <div id="video">
                    <h3 class="h3demonstration">Démonstration</h3>

                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $dataCocktail['video']?>"frameborder="0" allowfullscreen></iframe>
                </div>
            
            <div>

                <h3 id="avis">Donnez votre avis sur le <?= $dataCocktail['name']?> !</h3>

                <form method="POST" id="formComment">
                    <textarea class="form-control" rows="4" name="commentaireCocktail"></textarea>
                    <input type="submit" class="btn btn-primary btn-lg" name="commenter" value="commenter" id="commenter">
                </form>


            
                                  
                                        <?php 

            if (!empty($listecommentaires)) {            
            foreach ($listecommentaires as $key => $value) {
               echo'<div class="row">';
                echo'<div class="col-sm-1">';
                    echo'<div class="thumbnail">';
                    echo'<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">';
                    echo'</div><!-- /thumbnail -->';
                echo'</div><!-- /col-sm-1 -->';
                
                echo'<div class="col-sm-8">';
                    echo'<div class="panel panel-default">';
                        echo'<div class="panel-heading">';
                echo '<strong>'.$tabUser['username'].'</strong>';
                echo'</div>';
                echo'<div class="panel-body">';
                echo $value['text'];
                echo'</div>';
                // var_dump($key);
                // var_dump($tabUser['username']);
                // var_dump($value);
                echo'</div><!-- /panel panel-default -->';
                                  echo'</div><!-- /col-sm-5 -->';
                                  echo "</div>";
            }
            }

                                        ?>
                                    
                    
                    
            </div>
        </div>
            
    </div>
</section>





<?php $this->stop('main_content') ?>
