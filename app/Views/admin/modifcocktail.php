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
                    Mise à jour d'un cocktail
                </div>
                <div class="col-md-8 formulaire">
                <form  action="" method="POST" ?>
                    <div class="form-group">
                        <label for="dbId">Id base de données</label>
                        <input type="text" id="dbId" class="form-control" name="iddb" placeholder="" value="<?= $cocktaildata['id'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="apiId">Id API</label>
                        <input type="text" id="apiId" class="form-control" name="idcocktail" placeholder="" value="<?= $cocktaildata['idCocktailApi'] ?>">
                    </div>


                    <div class="form-group">
                        <label for="nomId">Nom</label>
                        <input type="text" id="nomId" class="form-control" name="nom" placeholder="" value="<?= $cocktaildata['nomCocktail'] ?>">
                    </div>


                    <div class="form-group">
                        <label for="descriptionId">Description</label>
                        <textarea id="descriptionId" class="form-control" rows="4" name="description" placeholder=""><?= $cocktaildata['description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="noteId">Note</label>
                        <input type="text" id="noteId" class="form-control" name="note" placeholder="" value="<?= $cocktaildata['note'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="compteurId">Note</label>
                        <input type="text" id="compteurId" class="form-control" name="compteurnote" placeholder="" value="<?= $cocktaildata['compteurnote'] ?>">
                    </div>                        

                        <?php foreach ($recettedata as $recette) : ?>
                            <div class="form-group">                  
                                <label for="texteId<?= $recette['ordre']?>">TEXTE Etape <?= $recette['ordre']?></label>
                                <textarea id="texteId<?= $recette['ordre']?>" rows="8" class="form-control" name="recettetextes[]" placeholder=""><?= $recette['texte'] ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="descriptionId<?= $recette['ordre']?>">DESCRIPTION Etape <?= $recette['ordre']?></label>
                                <textarea id="descriptionId<?= $recette['ordre']?>" rows="8" class="form-control" name="recettedescriptions[]" placeholder=""><?= $recette['description'] ?></textarea>

                            </div>
                            <div class="form-group">
                                <label for="langueId">Langue</label>
                                <select class="form-control">
                                    <option <?php if ($recette['langue'] == 'fr'){ echo "selected"; }?>>fr</option>
                                    <option <?php if ($recette['langue'] == 'en'){ echo "selected"; }?>>en</option>
                                </select>
                            </div>
                        <?php endforeach ?>

                    <button type="submit" class="btn btn-default">Mettre à jour</button>

                </form>
                </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>        
</div>

<?php $this->stop('main_content') ?>