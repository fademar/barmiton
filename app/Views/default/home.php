<?php $this->layout('layouthome', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="page vert">
    <div class="containersvg valign-wrapper"> 
        <div class="svgbox valign">
            <svg id="martini" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 100">
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
                    <form action="recherche/" method="POST">
                        
                        <div id="formulaire-home" class="row">       
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name=ingredients[] class="autocompletehome">
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div id="plus-ingredient" class="btn-floating waves-effect waves-light teal lighten-3"><i class="material-icons">add</i></a>
                                </div>
                                <div class="row center">
                                    <p class="center">ajouter un ingrédient</p>
                                </div>
                            </div>
                        </div>
                    


                        <button class="btn btn-large waves-effect waves-light" type="submit">Mixer !</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!-- <h5>Alcools</h5>
                        <p>
                            <input type="checkbox" name="alcoolsprincipaux[]" id="ginId" value="gin">
                            <label for="ginId">Gin</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcoolsprincipaux[]" id="vodkaId" value="vodka">
                            <label for="vodkaId">Vodka</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcoolsprincipaux[]" id="rhumId" value="rum">
                            <label for="rhumId">Rhum</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcoolsprincipaux[]" id="tequilaId" value="tequila">
                            <label for="tequilaId">Tequila</label>
                        </p>
                        <p>
                            <input type="checkbox" name="alcoolsprincipaux[]" id="whiskyId" value="whisky">
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
                        <p> -->


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
                            <div class="center-align margin-top-20"><button class="btn-floating waves-effect waves-light blue-grey lighten-4" data-target="modal-<?= $cocktailcard['id']?>"><i class="material-icons">add</i></button></div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>


<?php $this->stop('main_content') ?>
