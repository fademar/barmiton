<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

<header id="recherche">
    <div class="container">
        <div class="row center">
            <h2>Nouvelle recherche</h2>
            <form action="../recherche/" method="POST">

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="alcoolsprincipauxId">Alcools principaux</label>
                            <select id="alcoolsprincipauxId" name="alcoolprincipal[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options">    
                                <option value="gin">gin</option>
                                <option value="rum">rhum</option>
                                <option value="tequila">tequila</option>
                                <option value="vodka">vodka</option>
                                <option value="whisky">whisky</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-xs-12 col-md-6">
                        <label for="alcoolsId">Autres alcools/liqueurs</label>
                        <select id="alcoolsId" name="alcools[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['alcools'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <label for="softsId">Softs</label>
                        <select id="softsId" name="softs[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['softs'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <label for="softsId">Fruits/Jus de fruits</label>
                        <select id="softsId" name="fruits[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['fruits'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <label for="goutsId">Goûts</label>
                        <select id="goutsId" name="gouts[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['gouts'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <label for="occasionsId">Occasions</label>
                        <select id="occasionsId" name="occasions[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['occasions'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div id="submitbtn" class="col-xs-12 col-md-12 text-center">
                    <button class="btn btn-primary btn-lg" type="submit">Mixer !</button>                 
                </div>
            </form>
        </div>
    </div>
</header>



<!-- Résultats de recherche -->
<section id="results">
    <div class="container">
        <div class="row">
            <?php foreach ($cocktaillist as $cocktailcard): ?>
                <div class="col-xs-6 col-md-3 portfolio-item">     
                    <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>">
                        <img src="<?= $cocktailcard['imgurlsmall']?>" class="img-responsive img-rounded img-thumbnail" alt="">
                        <h3><?= $cocktailcard['name']?></h3>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
</section>

<!-- Pagination -->
<section id="pagination">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h3><?php if (!empty($previous)){ echo 'précédent'; } ?></h3>
                <h3><?php if (!empty($next)){ echo 'suivant'; } ?></h3>
            </div>
        </div>
    </div>
</section>


<!-- Pagination -->
<section id="pagination">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <?php if (!empty($previous)): ?><a href="<?= $this->url("recherche_precedent_showprecedent") ?>">précédent</a><?php endif ?>
                <?php if (!empty($next)): ?><a href="<?= $this->url("recherche_suivant_shownext") ?>">suivant</a><?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>