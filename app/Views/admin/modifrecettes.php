<?php $this->layout('layoutadmin2', ['title' => 'Modification cocktail']) ?>

<?php $this->start('main_content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Notifications API et BDD</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mise à jour des recettes pas à pas
                </div>
                <div class="col-md-8 formulaire">
                    <form  action="" method="POST" ?>
                        <?php foreach ($recettedata as $recette) : ?>
                            <div class="form-group">
                                <label for="dbId">Id base de données</label>
                                <input type="text" id="dbId" class="form-control" name="id" placeholder="" value="<?= $recette['id'] ?>">
                            </div>
                            
                            <div class="form-group">                  
                                <label for="texteId<?= $recette['ordre']?>">TEXTE Etape <?= $recette['ordre']?></label>
                                <textarea id="texteId<?= $recette['ordre']?>" rows="8" class="form-control" name="texte" placeholder=""><?= $recette['texte'] ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="descriptionId<?= $recette['ordre']?>">DESCRIPTION Etape <?= $recette['ordre']?></label>
                                <textarea id="descriptionId<?= $recette['ordre']?>" rows="8" class="form-control" name="description" placeholder=""><?= $recette['description'] ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="langueId">Langue</label>
                                <select id="langueId" class="form-control" name="langue">
                                    <option value="fr" <?php if ($recette['langue'] == 'fr'){ echo "selected"; }?>>fr</option>
                                    <option value="en" <?php if ($recette['langue'] == 'en'){ echo "selected"; }?>>en</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Mettre à jour</button>
                            <hr>
                        <?php endforeach ?>            
                                                               

                    </form>
                </div>
            </div>
        </div>
            <!-- /.panel-body -->
    </div>
        <!-- /.panel -->
</div>


<?php $this->stop('main_content') ?>