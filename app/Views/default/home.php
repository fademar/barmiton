<?php $this->layout('layouthome', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


 <!-- Header -->
    <header id="home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 valign-wrapper">
                    <div class="col-xs-12 col-md-6 valign">
                        <div class="svgbox">
                            <svg id="martini" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 65 100" preserveAspectRatio="xMinYMin meet">
                                <title>martini</title>
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
                                    <input id="ingredientId1" type="hidden" name="ingredients" value="">
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

    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 text-center">
                    <h2>Contactez-nous</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Téléphone</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


<?php $this->stop('main_content') ?>