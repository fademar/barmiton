<?php $this->layout('layoutadmin2', ['title' => 'Administration Updates']) ?>

<?php $this->start('main_content') ?>  

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Recettes à traduire</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID BDD</th>
                                        <th>ID COCKTAIL</th>
                                        <th>MODIFIER DONNEES</th>
                                        <th>MODIFIER RECETTES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listrecettes as $recette) :?>
                                        <tr>
                                            <td><?= $recette['id'] ?></td>
                                            <td><?= $recette['idcocktail'] ?></td>
                                            <td><a href="<?= $this->url('admin_modifierCocktail', ['idcocktail' => $recette['idcocktail']]) ?>" >Modifier</a></td>
                                            <td><a href="<?= $this->url('admin_modifierRecette', ['idcocktail' => $recette['idcocktail']]) ?>" >Modifier</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
</div>

<?php $this->stop('main_content') ?>
