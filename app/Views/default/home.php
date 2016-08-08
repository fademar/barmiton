<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="page vert">
    <div class="containersvg valign-wrapper"> 
        <div class="svgbox valign">
            <svg id="martini" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.46 100">
                <title>martini</title>
            </svg>
        </div>
    </div> 
    <div class="containersvg valign-wrapper">
        <div class="valign center">
            <h1>Barmiton</h1>
            <span class="slogan">Plus de 1000 recettes de cocktails !</span>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <div class="row center">
                    <h2>Choisissez vos ingrédients préférés</h2>
                    <form action="cocktails/cocktailliste/" method="POST">
                        <h5>Alcools</h5>
                        <p>
                            <input type="checkbox" name="alcool[]" id="ginId" value="gin">
                            <label for="ginId">Gin</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcool[]" id="vodkaId" value="vodka">
                            <label for="vodkaId">Vodka</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcool[]" id="rhumId" value="rum">
                            <label for="rhumId">Rhum</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcool[]" id="tequilaId" value="tequila">
                            <label for="tequilaId">Tequila</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcool[]" id="whiskyId" value="whisky">
                            <label for="whiskyId">Tequila</label>
                        </p>
                        <h5>Jus de fruits</h5>
                        <p>
                            <input type="checkbox" name="juice[]" id="pommeId" value="apple/or/apple-juice/or/apple-juice-fresh-pressed/or/apple-juice-hot">
                            <label for="pommeId">Pomme</label>
                        </p>
                        <p>
                            <input type="checkbox" name="juice[]" id="orangeId" value="orange-juice">
                            <label for="orangeId">Orange</label>
                        </p>
                        <p>
                            <input type="checkbox" name="juice[]" id="citronId" value="lemon-juice/or/lime-juice">
                            <label for="citronId">Citron / Citron vert</label>
                        </p>
                        <p>
                            <input type="checkbox" name="juice[]" id="fruitsrougesId" value="cherry-juice/or/cranberry-juice/or/raspberry-juice/or/strawberry-juice">
                            <label for="fruitsrougesId">Fruits rouges</label>
                        </p>
                        <p>
                            <input type="checkbox" name="juice[]" id="ananasId" value="pineapple-juice">
                            <label for="ananasId">Ananas</label>
                        </p>
                        <p>
                            <input type="submit" name="submit" value="mixer">
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container">
    <div class="section">
        <div class="row center">
            <h2>Notre sélection</h2>
            <?php foreach ($cocktailselection as $cocktailcard): ?>
                <div class="col s12 m7 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $cocktailcard['imgurlsmall']?>">
                        </div>
                        <div class="card-action">
                            <div class="card-title grey-text text-darken-4 center-align"><?= $cocktailcard['name']?></div>
                            <!-- Modal Trigger -->
                            <div class="center-align margin-top-20"><button class="btn-floating waves-effect waves-light blue-grey lighten-4 modal-trigger" data-target="modal-<?= $cocktailcard['id']?>"><i class="material-icons">add</i></button></div>
                        </div>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal-<?= $cocktailcard['id']?>" class="modal">
                    <div class="modal-content">
                        <h4><?= $cocktailcard['name']?></h4>
                        <div>
                            <p><?= $cocktailcard['description']?></p>
                        </div>
                        <div>
                            <img src="<?= $cocktailcard['imgurlmodal']?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close red btn-flat">Fermer</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>


    <?php $this->stop('main_content') ?>
