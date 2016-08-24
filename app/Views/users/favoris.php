<?php $this->layout('layout', ['title' => 'Favoris']) ?>

<?php $this->start('main_content') ?>


<!-- Page profil -->
<section id="favoris">
    <div class="container">
        <?php if (empty($favorislist)) : ?>
        <div class="row">
            <div class="text-center">
                <h2><?= $w_user['Prenom']?>, vous n'avez pas encore de cocktails favoris</h2>
                <hr class="glass-primary">
            </div>
        </div>

        <?php else : ?>
        <div class="row">
            <div class="text-center">
                <h2><?= $w_user['Prenom']?>, voici vos cocktails favoris</h2>
                <hr class="glass-primary">
            </div>
        </div>
        <div class="row">
                <?php foreach ($favorislist as $favoris): ?>
                    <div class="card-box col-md-3 col-sm-6">
                        <div class="card" data-mh="searchgroup">                            
                            <div class="header">
                                <img classs="img-responsive" src="<?= $favoris['favorisdata']['imgurlsmall']?>"/>
                                <div class="filter"></div>
                                
                                <a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $favoris['favorisdata']['id']]); ?>">
                                    <div class="actions">
                                        <i class="fa fa-search quatre" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>

                            <div class="content">
                                <h4 class="title"><a href="<?= $this->url("cocktails_afficher_cocktail", ["id" => $favoris['favorisdata']['id']]); ?>"><?= $favoris['favorisdata']['name']?></a></h4>
                                
                                <form method=POST action="">
                                    <button class="btn btn-defaut btn-circle" type="submit" name="supprimer" value="<?= $favoris['idfavoris'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </div>                                           
                        </div> <!-- end card -->
                    </div>
                <?php endforeach ?>
            <?php endif ?>

        </div>
    </div>
</section>

<?php $this->stop('main_content') ?>