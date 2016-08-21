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
                <div class="card-box col-md-3 col-sm-6">
                    <div class="card" data-mh="searchgroup">                            
                        <div class="header">
                            <img classs="img-responsive" src="<?= $this->assetUrl('img/' . $outil['idapi']. '.jpg') ?>"/>
                            <div class="filter"></div>

                            <div class="actions">
                                <button class="btn btn-round btn-fill btn-neutral btn-modern">
                                    <a href="<?= $this->url("outils_showficheoutil", ["id" => $outil['idapi']]); ?>">
                                        Détails</a>
                                    </button>
                            </div>
                        </div>

                        <div class="content">
                            <h4 class="title"><a href="<?= $this->url("outils_showficheoutil", ["id" => $outil['idapi']]); ?>"><?= $outil['nom']?></a></h4>
                        </div>                                           
                    </div> <!-- end card -->
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>


<?php $this->stop('main_content') ?>