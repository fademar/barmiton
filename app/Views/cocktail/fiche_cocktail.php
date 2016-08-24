<?php $this->layout('layout', ['title' => 'Fiche cocktail']) ?>

<?php $this->start('main_content') ?>

<!-- section de recherche --> 
<section id="fiche">
    <div class="container">
        <div class="back-btn"><button onclick="history.go(-1);" class="btn btn-default"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Retour</button></div>
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h1><?= $dataCocktail['name']?></h1>
                <hr class="glass-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-6">
                    <img src="<?= $dataCocktail['imgurlmodal']?>">
                </div>
                <div class="col-xs-12 col-md-6 pull-middle"> 
                    <h2>Ingrédients</h2>
                    <?php foreach($dataCocktail['ingredients'] as $element) : ?>
                        <p><?= $element ?></p>
                    <?php endforeach ?>

                    

                    <h2>En résumé</h2>
                    <p><?= $dataCocktail['description']?><?php if ($dataCocktail['langue'] == 'en') { echo '<p class="small note">Note : Ce texte a été traduit automatiquement par Google. Notre équipe met tout en oeuvre pour l\'améliorer.</p>';} ?></p>
                        
            </div>
            <div class="col-xs-12 col-md-12 text-center">        
                     <h2>Vous aimez ?</h2>
                        <form method="POST">
                            <div>
                                <button type="submit" id="confirmFavoris" class="btn btn-default btn-round-lg" name="ajouterFavoris" <?php if (empty($w_user)) {echo 'disabled';} ?> ><i class="fa fa-heart" aria-hidden="true"></i>  Favori</button>
                                <input type="hidden" name="iddrink" value="<?php echo $dataCocktail['id']; ?>" />
                            </div>
                            <div>
                            <?php if($dataCocktail["note"] > 0) : ?>
                                <div class="note">Note : <?= round($dataCocktail["note"] / $dataCocktail["compteurnote"], PHP_ROUND_HALF_UP) ?>/5</div> 

                            <?php else : ?>
                                <p class="small">Ce cocktail n'a pas encore été noté. Soyez le premier !</p>                        
                            <?php endif ?>
                            <span class="star-rating">
                                <input type="hidden" name="iddrink" value="<?php echo $dataCocktail['id']; ?>" />
                                <input type="radio" name="note" value="1"><i></i>
                                <input type="radio" name="note" value="2"><i></i>
                                <input type="radio" name="note" value="3"><i></i>
                                <input type="radio" name="note" value="4"><i></i>
                                <input type="radio" name="note" value="5"><i></i>
                            </span>
                            <span><input type="submit" id="confirmNotation" class="btn btn-default" name="noter" value="Noter" <?php if (empty($w_user)) {echo 'disabled';} ?>></span>
                            </div>
                            <div>
                                <?php if (empty($w_user)) : ?><p class="small note"><a href="#connexion" data-toggle="modal">Connectez-vous</a> à votre compte ou <a href="<?= $this->url('Users_UsersInscription')?>">inscrivez-vous</a> pour enregistrer ce cocktail dans vos favoris ou lui attribuer une note.</p><?php endif ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">

                <h2 class="text-center">Recette pas-à-pas</h2>
                <ul class="timeline">
                    <?php  foreach ($recette as $etape) : ?>
                            <li <?php if (($etape['ordre'])%2 == 0) { echo 'class="timeline-inverted"';} ?>>
                                <div class="timeline-badge"><?= $etape['ordre'] ?></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title"><?= $etape['texte'] ?></h3>
                                    </div>
                                    <div class="timeline-body">
                                        <p><?= $etape['description'] ?></p>
                                        <?php if ($etape['langue'] == 'en') { echo '<p class="small note">Note : Ce texte a été traduit automatiquement par Google. Notre équipe met tout en oeuvre pour l\'améliorer.</p>';} ?>
                                    </div>
                                </div>
                            </li>
                    <?php endforeach ?>
                </ul> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Démonstration</h2>
                <div class="video">
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/<?= $dataCocktail['video']?>" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Donnez votre avis sur le <?= $dataCocktail['name']?> !</h2>
                <form method="POST" id="formComment">
                    <?php if (empty($w_user)) : ?><p class="small note"><a href="#connexion" data-toggle="modal">Connectez-vous</a> à votre compte ou <a href="<?= $this->url('Users_UsersInscription')?>">inscrivez-vous</a> pour soumettre un commentaire.</p><?php endif ?>
                    <textarea class="form-control" rows="4" name="commentaireCocktail"></textarea>
                    <button type="submit" class="btn btn-primary btn-lg" name="commenter" <?php if (empty($w_user)) {echo 'disabled';} ?> >commenter</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
            <?php if (!empty($listecommentaires)) : ?>
                <?php foreach ($listecommentaires as $key => $value) :?>
                    <div class="row">
                        <div class="commentaires">
                            <div class="col-sm-1 col-md-1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">';
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->
                            <div class="col-sm-11 col-md-11">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong><?= $tabUser['username'] ?></strong>
                                    </div>
                                    <div class="panel-body">
                                        <?= $value['text'] ?>
                                    </div>
                                </div><!-- /panel panel-default -->';
                            </div><!-- /col-sm-8 -->
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            </div>                                       
        </div>          
    </div>
</section>


<?php $this->stop('main_content') ?>
