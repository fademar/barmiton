<?php $this->layout('layout', ['title' => 'Fiche outil']) ?>

<?php $this->start('main_content') ?>

<!-- section de recherche --> 
<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2><?= $outil['nom']?></h2>
                <hr class="glass-primary">
            </div>
        </div>
        <div class="row">
            <div id="" class="col-xs-6 .col-md-6 text-center">
                <img src="<?= $this->assetUrl('img/' . $outil['idapi']. '.jpg') ?>" class="img-responsive img-rounded img-thumbnail" alt="">
            </div>
            <div id="" class="col-xs-6 .col-md-6 text-center">
                <h3>Description</h3>
                <p><?= $outil['description'] ?></p>
            </div> 
        </div>
        <div class="row">
            <div class="col-xs-12 .col-md-12 text-center">
                 <iframe width="560" height="315" src="http://assets.absolutdrinks.com/videos/<?= $outil['video']?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
            
    </div>
</section>





<?php $this->stop('main_content') ?>
