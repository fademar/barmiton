


<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mises à jour
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?= $this->url('admin_admin') ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-glass"></i> Cocktails
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Mises à jour de l'API</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover sortable">
                                <thead>
                                    <tr>
                                        <th>UPDATEID</th>
                                        <th>DATE</th>
                                        <th>URL</th>
                                        <th>CATÉGORIE</th>
                                        <th>IDENTIFIANT</th>
                                        <th>MODIFICATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($updates as $update) :?>
                                        <tr>
                                            <td><?= $update->updateId ?></td>
                                            <td><?php 
                                                    $date = new DateTime($update->timeStamp); 
                                                    echo $date->format('d/m/Y H:i'); ?></td>
                                            <td><?= $update->resource ?></td>
                                            <td><?= $update->objectType ?></td>
                                            <td><?= $update->objectId ?></td>
                                            <td><?= $update->typeOfChange ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                 <div class="row">
                    <div class="col-lg-6 center-block">
                        <h2>Mettre à jour la base de données de cocktails</h2>
                        <form role="form" action="" method="POST">

                            <div class="form-group">
                                <label for="cocktailId">Entrez l'id du cocktail</label>
                                <input id="cocktailId" class="form-control" type="text" name="idcocktail">
                            </div>
                            <button type="submit" class="btn btn-default" name="searchbd">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                        

                        <?php if (!empty($cocktaildata)) : ?>
                        
                        <form role="form" action="" method="POST" ?>
                            <div class="form-group">
                                <label for="dbId">Id base de données</label>
                                <input type="text" id="dbId" class="form-control" name="iddb" placeholder="" value="<?= $cocktaildata['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="dbId">Id API</label>
                                <input type="text" id="dbId" class="form-control" name="idapi" placeholder="" value="<?= $cocktaildata['idCocktailApi'] ?>">
                            </div>
                                      
                            
                            <div class="form-group">
                                <label for="nomId">Nom</label>
                                <input type="text" id="nomId" class="form-control" name="nom" placeholder="" value="<?= $cocktaildata['nomCocktail'] ?>">
                            </div>


                            <div class="form-group">
                                <label for="descriptionId">Description</label>
                                <input type="text-area" id="descriptionId" class="form-control" name="description" placeholder="" value="<?= $cocktaildata['description'] ?>">
                            </div>

                             <div class="form-group">
                                <label for="noteId">Note</label>
                                <input type="text" id="noteId" class="form-control" name="note" placeholder="" value="<?= $cocktaildata['note'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="compteurId">Note</label>
                                <input type="text" id="compteurId" class="form-control" name="compteurnote" placeholder="" value="<?= $cocktaildata['compteurnote'] ?>">
                            </div>                        

                             <div class="form-group">
                                <label>Langue</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="langue" value="fr" <?php if ($cocktaildata['langue'] === 'fr') { echo 'selected';} ?>>Français
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="langue" value="en" <?php if ($cocktaildata['langue'] === 'en') { echo 'selected';} ?>>Anglais
                                    </label>
                                </div>
                            </div>
                        </form>

                        <?php endif ?>



                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


