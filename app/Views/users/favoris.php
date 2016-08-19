<?php $this->layout('layout', ['title' => 'Favoris']) ?>

<?php $this->start('main_content') ?>


<!-- Page profil -->
<section id="profil">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2><?= $w_user['Prenom']?>, voici vos cocktails favoris</h2>
                <hr class="glass-primary">
            </div>
        </div>

        <div class="row">
            <?php foreach ($favorislist as $favoris): ?>
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

<?php $this->stop('main_content') ?>