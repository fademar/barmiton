<?php $this->layout('layout', ['title' => 'Bar-à-Outils']) ?>

<?php $this->start('main_content') ?>


<section id="outils">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Les outils du barman</h2>
                <hr class="glass-primary">
            </div>
        </div>
        <div class="row">
            <?php foreach ($outils as $outil): ?>
                <div class="col-xs-6 col-md-3 portfolio-item">     
                    <a href="<?= $this->url("outils_showficheoutil", ["id" => $outil['idapi']]); ?>">
                        <img src="<?= $this->assetUrl('img/' . $outil['idapi']. '.jpg') ?>" class="img-responsive img-rounded img-thumbnail" alt="">
                        <h3><?= $outil['nom']?></h3>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>


<?php $this->stop('main_content') ?>