<?php $this->layout('layout', ['title' => 'Recherche']) ?>

<?php $this->start('main_content') ?>

<header id="resultats">
    <div class="container">
        <div class="row center">
            <form action="../recherche/" method="GET">

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <label for="alcoolsprincipauxId">Alcools principaux</label>
                        <select id="alcoolsprincipauxId" name="alcoolsprincipaux[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['alcoolsprincipaux'] as $champ): ?>     
                                <option value="<?php echo $champ['idIngredientsApi']?>"><?php echo (mb_strtolower($champ['nomIngredient'], 'UTF-8')); ?></option>
                            <?php endforeach ?>
                        </select>
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
                    <div class="col-xs-12 col-md-6">
                        <label for="goutsId">Goûts</label>
                        <select id="goutsId" name="gouts[]" class="form-control selectpicker" multiple title="Choisissez une ou plusieurs options"> 
                            <?php foreach($form['gouts'] as $champ): ?>     
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

<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <a class="btn btn-default" href="?<?= $_SERVER['QUERY_STRING']. '&tri=facile'?>" role="button">Facile</a>                    
                <a class="btn btn-default" href="?<?= $_SERVER['QUERY_STRING']. '&tri=moyen'?>" role="button">Moyen</a>                    
                <a class="btn btn-default" href="?<?= $_SERVER['QUERY_STRING']. '&tri=difficile'?>" role="button">Difficile</a>                    
                <a class="btn btn-default" href="?<?= $_SERVER['QUERY_STRING']. '&tri=meilleurs'?>" role="button">Les mieux notés</a>                    
                
                
            </div>
        </div>
    </div>
</section>

 

<!-- Sélection des meilleurs cocktails -->
<section id="results">
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
                    <div class="item">
                        <div class="col-xs-6 col-md-3 portfolio-item">
                            <div class="card">
                                <img class="card-img-top center-block" src="<?= $cocktailcard['imgurlsmall']?>" alt="Photo du cocktail <?= $cocktailcard['name']?>">
                                <div class="card-block">
                                    <h3 class="card-title"><?= $cocktailcard['name']?></h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?= $cocktailcard['note']?></li>
                                    <li class="list-group-item"><?php foreach ($cocktailcard['occasionsfr'] as $occasion): ?><?= $occasion ?><?php endforeach ?></li>
                                    <li class="list-group-item"><?= $cocktailcard['skill']?></li>
                                </ul>
                                <div class="card-block">
                                    <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>" class="card-link">Détails</a>
                                </div>
                            </div>
                        </div>
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
                                <div class="col-xs-6 col-md-3 portfolio-item">     
                                    <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>">
                                        <img src="<?= $cocktailcard['imgurlsmall']?>" class="img-responsive img-rounded img-thumbnail" alt="">
                                        <h3><?= $cocktailcard['name']?></h3>
                                    </a>
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
            <div class="col-xs-12 col-md-12 text-center">
                <?php if ($nbpages > 0) :?>                       
                        <div id="pagination">
                            <?php for ($i=2; $i <=$nbpages ; $i++): ?>
                                <a href="?<?= $querypage . '&page='. $i ?>" class="next"><?= $i?></a>
                            <?php endfor ?>
                        </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>


<?php $this->stop('main_content') ?>