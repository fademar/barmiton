<?php $this->layout('layouthome', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

 <!-- Header -->
    <div id="cookie-message"></div>
    <header id="home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 valign-wrapper">
                    <div class="col-xs-12 col-md-6 valign">
                        <div class="svgbox">
                            <svg id="martini" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 65 100" preserveAspectRatio="xMinYMin meet">
                                <title>martini</title>
                                
                                <path d="M47.15 99.33a7.28 7.28 0 0 0-3-1.4l-8.51-2.41A3.87 3.87 0 0 1 33 92.1l-1.16-41.67c0-1.48-.77-2.69-1.61-2.69s-1.57 1.26-1.61 2.69L27.44 92.1a3.89 3.89 0 0 1-2.64 3.41l-8.51 2.41a7.2 7.2 0 0 0-3 1.4c-.23.37.78.67 2.25.67h29.37c1.46.01 2.47-.3 2.24-.66z" fill="#F6F9FA" />

                                <path d="M58.89 8.61H1.57c-1.46 0-2 1-1.18 2.24l28.37 43.33a1.63 1.63 0 0 0 2.94 0l28.38-43.33c.81-1.23.27-2.24-1.19-2.24z" fill="#FFFFFF"/>

                                <path d="M51.81 0l.36.21-3.24 6.86-17.36 30.38-4.26 6.26-.36-.21 3.24-6.86L47.56 6.26 51.81 0" fill="#b99664"/>

                                <path d="M49.21 17.5h-38c-1.46 0-2 1-1.15 2.21l18.65 27.17a1.71 1.71 0 0 0 3 0l18.65-27.17c.82-1.22.32-2.21-1.15-2.21z" fill="#BAD1CD" opacity="0.7"/>
    
                                <path d="M28.49 29.45c-3.12 5.46-1.48 7.86 1.3 9.48s5.67 1.86 8.79-3.6 1.48-7.86-1.3-9.49-5.67-1.84-8.79 3.61z" fill="#bed630"/>

                                <path d="M28.49 29.45c-3.12 5.46-1.48 7.86 1.3 9.48s5.67 1.86 8.79-3.6 1.48-7.86-1.3-9.49-5.67-1.84-8.79 3.61z" fill="#BAD1CD" opacity="0.2"/>

                                <path d="M58.89 8.61H30.23V100h14.68c1.46 0 2.48-.3 2.25-.67a7.23 7.23 0 0 0-3-1.4l-8.51-2.41A3.87 3.87 0 0 1 33 92.1l-1.08-38.3 28.14-43c.83-1.18.29-2.19-1.17-2.19z" fill="#D2D7D3" opacity="0.3" isolation="isolate"/>
                            </svg>
                        </div>
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