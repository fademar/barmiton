<?php $this->layout('layoutadmin2', ['title' => 'Gestion des membres']) ?>

<?php $this->start('main_content') ?>



<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Gestion des membres</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
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
								<th>Id</th>
								<th>Pseudo</th>
								<th>Email</th>
								<th>Role</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<?php	foreach ($users as $key => $value): ?>

							<tr>
								<td><?= $users[$key]['id']?></td>
								<td><?= $users[$key]['username']?></td>
								<td><?= $users[$key]['email']?></td>
								<td><?= $users[$key]['role']?></td>
								<td><a href="<?= $this->url('Admin_modifier_membre',['id'=>$users[$key]['id']])?>">modifier</a></td>
								<td><a href="<?= $this->url('Admin_supprimer_membre',['id'=>$users[$key]['id']])?>">supprimer</a><td>
							</tr>
						<?php endforeach ?>
						</table>


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