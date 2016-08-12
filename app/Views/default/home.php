<?php $this->layout('layouthome', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <svg id="martini" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 100">
                        <title>martini</title>
                    </svg>
                </div>
                <div class="col-lg-6">
                    <div class="intro-text">
                        <span class="name">Barmiton</span>
                        <hr class="star-light">
                        <span class="skills">Plus de 1000 recettes de cocktails !</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulaire de recherche -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Choisissez vos ingrédients préférés</h2>
                    <hr class="star-primary">
                </div>
            </div>
                    

            <div class="row">
                <form action="recherche/" method="POST">
                    <div id="inputingredients">
                        <div id="multiple-datasets" class="center-block">
                            <input class="typeahead" type="text" placeholder="ingrédient">
                            <button type="button" class="btn btn-secondary btn-ajouter">ajouter</button>
                        </div>
                    </div>

        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="input" class="btn btn-primary btn-lg">mixer !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Section de sélection -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Notre sélection</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <?php foreach ($cocktailselection as $cocktailcard): ?>
                    <div class=".col-xs-6 .col-sm-4">
                        <img src="<?= $cocktailcard['imgurlsmall']?>">
                        <h3><?= $cocktailcard['name']?></h3>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
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
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
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