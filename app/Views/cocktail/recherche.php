<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

<header class="recherche">
    <div class="container">
        <div class="row center">
            <h2 class="searchtrigger text-center">Nouvelle recherche</h2>
            <div class="text-center"><i class="fa fa-arrow-circle-o-down searchtrigger" aria-hidden="true"></i></div>
            <div class="divsearch">
                <form action="../recherche/" method="GET">
                    <h3 class="text-center">Ingrédients</h3>    
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="alcoolsprincipauxId">Alcools principaux</label>
                        <select id="alcoolsprincipauxId" name="alcoolsprincipaux[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['alcoolsprincipaux'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>


                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="alcoolsId">Autres alcools</label>
                        <select id="alcoolsId" name="alcools[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['alcools'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="softsId">Softs</label>
                        <select id="softsId" name="softs[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['softs'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <label for="softsId">Fruits/Jus de fruits</label>
                        <select id="softsId" name="fruits[]" class="form-control selectpicker" multiple data-live-search="true" title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['fruits'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>

                    <h3 class="text-center">Options</h3>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <label for="goutsId">Goûts</label>
                        <select id="goutsId" name="gouts[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['gouts'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <label for="couleursId">Couleurs</label>
                        <select id="couleursId" name="couleurs[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['couleurs'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <label for="difficultesId">Difficulté</label>
                        <select id="difficultesId" name="difficultes[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['difficultes'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <label for="occasionsId">Occasions</label>
                        <select id="occasionsId" name="occasions[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['occasions'] as $champ): ?>     
                                <option value="<?php echo $champ['champuk']?>"><?php echo (mb_strtolower($champ['champfr'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>

                    <div id="submitbtn" class="col-xs-12 col-md-12 text-center">
                        <button class="btn btn-primary btn-lg" type="submit">Rechercher</button>                 
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>




<!-- Résultats de la recherche -->
<section class="withheader" id="results">
    <div class="container">
        <?php if (empty($error)) : ?>
           <div class="row">
               <div class="col-xs-12 col-md-12 text-center">
                   <h2>Nous vous proposons <?php if ($nbcocktails > 1) {echo $nbcocktails . ' cocktails'; } else {echo 'un cocktail';} ?> </h2>
                   <hr class="glass-primary">
               </div>
           </div>
           <div id="cocktails" class="row">

            <?php foreach ($cocktaillist as $cocktailcard): ?>
                <div class="card-box col-md-3 col-sm-6">
                    <div class="card" data-mh="searchgroup">                            
                        <div class="header">
                            <img classs="img-responsive" src="<?= $cocktailcard['imgurlsmall']?>"/>
                            <div class="filter"></div>

                            <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>">
                                <div class="actions"> 
                                    <i class="fa fa-search quatre" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>

                        <div class="content">
                            <h4 class="title"><a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>"><?= $cocktailcard['name']?></a></h4>
                            <p class="description">Un cocktail <?= $cocktailcard['gouts'] ?> pour <?= $cocktailcard['occasions'] ?>.</p>
                        </div>                                           
                    </div> <!-- end card -->
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <?php if (!empty($error)): ?>

     <div class="row">
       <div class="col-xs-12 col-md-12 text-center">
           <h2><?php echo $error ?></h2>
       </div>
   </div>

   <?php foreach ($cocktailoops as $nom => $cocktailslist) : ?>

    <section id="selection<?= $nom ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center">

                    <h2>Des cocktails composés <?php if ((substr($nom, 0, 1) === 'A') || (substr($nom, 0, 1) === 'E') || (substr($nom, 0, 1) === 'I') || (substr($nom, 0, 1) === 'O') || (substr($nom, 0, 1) === 'U')) { echo "d'" . $nom; } else { echo "de " . $nom;}?></h2>

                    <hr class="glass-primary">
                </div>
            </div>
            <div class="row">
                <?php foreach ($cocktailslist as $cocktailcard): ?>
                    <div class="card-box col-md-3 col-sm-6">
                        <div class="card" data-mh="searchgroup">                            
                            <div class="header">
                                <img classs="img-responsive" src="<?= $cocktailcard['imgurlsmall']?>"/>
                                <div class="filter"></div>

                                <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>">
                                    <div class="actions">
                                        <i class="fa fa-search quatre" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>

                            <div class="content">
                                <h4 class="title"><a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>"><?= $cocktailcard['name']?></a></h4>
                                <p class="description">Un cocktail <?= $cocktailcard['gouts'] ?> pour <?= $cocktailcard['occasions'] ?>.</p>
                            </div>                                           
                        </div> <!-- end card -->
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

<?php endforeach ?>

<?php endif ?>

</div>
</section>

<!-- pagination -->
<section>
    <div class="container">
        <div class="row">
            <input type="hidden" id="nbpages" value="<?php echo $nbpages ?>">
            <input type="hidden" id="querypage" value="<?php echo $querypage ?>">
            <div class="col-xs-12 col-md-12 text-center">
                <?php if ($nbpages > 0) :?>                       
                    <nav aria-label="Page navigation">
                        <ul class="pagination">


                            <?php for ($i=1; $i < $nbpages ; $i++): ?>

                                <li><a href="?<?php echo $querypage . '&page='. $i ?>" class="next"><?= $i?></a></li>
                                

                            <?php endfor ?>

                        </ul>
                    </nav>

                <?php endif ?>
            </div>
        </div>
    </div>
</section>


<?php $this->stop('main_content') ?>