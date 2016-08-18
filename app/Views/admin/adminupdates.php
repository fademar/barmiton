<?php $this->layout('layoutadmin', ['title' => 'Administration Updates']) ?>

<?php $this->start('main_content') ?>  
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?= $this->url('admin_admin') ?>"><i class="fa fa-fw fa-dashboard"></i> Tableau de bord</a>
                    </li>
                    <li class="active">
                        <a href="<?= $this->url('admin_updatecocktail') ?>"><i class="fa fa-fw fa fa-plus"></i> Updates</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Base de données <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"><i class="fa fa-fw fa fa-glass"></i> Cocktails</a>
                            </li>
                            <li>
                                <a href="#">Ingrédients</a>
                            </li>
                            <li>
                                <a href="#">Goûts</a>
                            </li>
                            <li>
                                <a href="#">Couleurs</a>
                            </li>
                            <li>
                                <a href="#">Occasions</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-comment"></i> Commentaires</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-user"></i> Membres</a>
                    </li>
                    
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
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
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php $this->stop('main_content') ?>
