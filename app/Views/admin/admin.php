<?php $this->layout('layoutadmin2', ['title' => 'Accueil Backoffice']) ?>

<?php $this->start('main_content') ?>  

<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mises à jour de l'API
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   </div>        
</div>

<?php $this->stop('main_content') ?>