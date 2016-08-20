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
            <form method=POST action="">
                <?php foreach ($favorislist as $favoris): ?>
                    <div class="col-xs-6 col-md-3 portfolio-item">     
                        <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $favoris['favorisdata']['id']]); ?>">
                            <img src="<?= $favoris['favorisdata']['imgurlsmall']?>" class="img-responsive img-rounded img-thumbnail" alt="">
                            <h3><?= $favoris['favorisdata']['name']?></h3>
                        </a>
                        <button class="btn btn-default" type="submit" name="supprimer" value="<?= $favoris['idfavoris'] ?>">Supprimer</button>
                    </div>
                <?php endforeach ?>
            </form>
        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>