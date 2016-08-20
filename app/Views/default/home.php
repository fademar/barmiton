<?php $this->layout('layouthome', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

 <!-- Header -->
    <div id="cookie-message"></div>
    <header id="home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 valign-wrapper">
                    <div class="col-xs-12 col-md-6 valign">
                        
                        <svg id="martini" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 786.13 923.71">
                          <defs>
                            <filter id="a" width="454.55" height="942" x="212.69" y="77.09" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                              <feFlood flood-color="#fff" result="bg"/>
                              <feBlend in="SourceGraphic" in2="bg"/>
                            </filter>
                            <mask id="b" width="454.55" height="942" x="0" y="0" maskUnits="userSpaceOnUse">
                              <path fill="#1d1e1c" stroke="#fff" stroke-miterlimit="10" d="M468 1018.59a82.25 82.25 0 0 1-82.15-82.15V403.39h280.89v533.05a82.25 82.25 0 0 1-82.15 82.15H468z" transform="translate(-212.69 -77.09)" filter="url(#a)"/>
                            </mask>
                          </defs>
                          <g mask="url(#b)">
                            <g fill="#fdefe3">
                              <path d="M117.84.46L99.92 27.91l14.53-3a58.5 58.5 0 0 1 30.49 1.77l13.23-20.25A82 82 0 0 0 117.84.46zM184.23 70.44l.83 4 27.91 18.24-5.66-27a82 82 0 0 0-22.92-41.88l-13.26 20.3a58.55 58.55 0 0 1 13.1 26.34zM35.95 17.19L17.71 45.1l38.7-8.1L74.65 9.09l-38.7 8.1M238.82 331l27.91 18.24-8.8-42.02-27.92-18.24 8.81 42.02M212.09 203.44l8.81 42.02 27.91 18.25-8.81-42.03-27.91-18.24M222.08 136.15l-27.91-18.25 8.81 42.03 27.91 18.24-8.81-42.02"/>
                            </g>
                            <path fill="#37a6de" d="M230.01 288.98l27.92 18.24-9.12-43.51-27.91-18.25 9.11 43.52M109.62 1.76l-35 7.33-18.21 27.9 43.51-9.08L117.84.49a83.13 83.13 0 0 0-8.22 1.27zM0 24.73L4.83 47.8l12.88-2.7 18.24-27.91L0 24.73M212.97 92.63l-27.92-18.24 9.12 43.51 27.91 18.25-9.11-43.52M171.12 44.01l13.26-20.3a83.18 83.18 0 0 0-26.2-17.37l-13.23 20.25a59.32 59.32 0 0 1 26.17 17.42zM230.89 178.17l-27.91-18.24 9.11 43.51L240 221.68l-9.11-43.51"/>
                          </g>
                          <path fill="#ec6659" d="M347.67 470.43L161.28 233.64h372.77L347.67 470.43"/>
                          <path fill="#ffd464" d="M623.72 14.27a162.5 162.5 0 0 0-158.99 195.64h88l43.31-55a35.18 35.18 0 0 1 55.28 43.51l-98.01 124.64a162.43 162.43 0 1 0 70.41-308.79z"/>
                          <path fill="#fff" d="M632.75 183.79a11.49 11.49 0 0 0-18.06-14.21l-267 339.23-267-339.23a11.49 11.49 0 1 0-18.06 14.21l273.55 347.57v369.37H206.66a11.5 11.5 0 1 0 0 23h282a11.5 11.5 0 1 0 0-23h-129.5V531.36z"/>
                        </svg>

                    </div>
                    <div class="col-xs-12 col-md-6 valign">
                        <div class="intro-text">
                            <span class="name">Barmiton</span>
                            <hr class="glass-light">
                            <span class="skills">Plus de 1000 recettes de cocktails !</span>
                        </div>
                        <div class="btn-begin">
                            <button type="button" class="btn btn-primary btn-lg"><a href="#recherche">Commencer !</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- section de recherche -->
    <section id="recherche">
        <div class="container">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Choisissez vos ingrédients préférés</h2>
                <hr class="glass-primary">
            </div>
            <div class="center-block">
                <form action="recherche/" method="GET">    
                    <div class="col-xs-12 col-md-12">
                        <div class="col-md-6 col-md-offset-3">                         
                            <div class="fieldcontainer">
                                <div>
                                    <input id="ingredient1" class="typeaheadhome" type="text" placeholder="">
                                    <span><a href="javascript:void(0);" class="btn-ajouter" title="ajouter un champ"><i class="fa fa-plus-circle"></i></a></span>
                                </div>
                            </div>
                            <div class="results">
                                <div>
                                    <input id="ingredientId1" type="hidden" name="ingredients[]" value="">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-xs-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Mixer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Section de sélection -->
    <section id="selection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center">
                    <h2>Nos suggestions</h2>
                    <hr class="glass-grey">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center">
                    <?php foreach ($cocktailselection as $cocktailcard): ?>
                        <div class="col-xs-6 col-md-4 portfolio-item">     
                            <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $cocktailcard['id']]); ?>">
                                <img src="<?= $cocktailcard['imgurlsmall']?>" class="img-responsive img-rounded img-thumbnail" alt="">
                                <h3><?= $cocktailcard['name']?></h3>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>


<?php $this->stop('main_content') ?>

<?php $this->start('js') ?>
    <!-- Bloodhound JS -->
    <script src="<?= $this->assetUrl('js/bloodhound.min.js') ?>"></script>

    <!-- handlebars JS -->
    <script src="<?= $this->assetUrl('js/handlebars.min.js') ?>"></script>

    <!-- Typeahead JS -->
    <script src="<?= $this->assetUrl('js/typeahead.jquery.min.js') ?>"></script>
    
    <!-- Snap SVG JS -->
    <script src="<?= $this->assetUrl('js/vendor/snap.svg-min.js') ?>"></script>

        <!-- Functions JS -->
    <script src="<?= $this->assetUrl('js/functions.js') ?>"></script>

    <!-- Création du SVG de la home -->
    <script src="<?= $this->assetUrl('js/svg.js') ?>"></script>

    <!-- Autocomplete du Typeahead -->
    <script src="<?= $this->assetUrl('js/autocomplete.js') ?>"></script>

<?php $this->stop('js') ?>