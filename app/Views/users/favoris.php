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
                    <div class="card-box col-md-3 col-sm-6">
                        <div class="card" data-mh="searchgroup">                            
                            <div class="header">
                                <img classs="img-responsive" src="<?= $favoris['favorisdata']['imgurlsmall']?>"/>
                                <div class="filter"></div>

                                <div class="actions">
                                    <button class="btn btn-round btn-fill btn-neutral btn-modern">
                                        <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $favoris['favorisdata']['id']]); ?>">
                                            Détails</a>
                                        </button>
                                </div>
                            </div>

                            <div class="content">
                                <h4 class="title"><a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $favoris['favorisdata']['id']]); ?>"><?= $favoris['favorisdata']['name']?></a></h4>
                                
                                <button class="btn btn-danger btn-circle" type="submit" name="supprimer" value="<?= $favoris['idfavoris'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </div>                                           
                        </div> <!-- end card -->
                    </div>
                <?php endforeach ?>
            </form>
        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>