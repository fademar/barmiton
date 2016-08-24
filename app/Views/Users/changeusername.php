<?php $this->layout('layout', ['title' => 'Changer votre pseudo']) ?>

<?php $this->start('main_content') ?>

<h2>Changer votre pseudo :</h2>

<form method="POST" action="">

  <div class="form-group">
    <label for="newUsernameId">Nouveau pseudo</label>
    <input type="text" class="form-control" id="newUsernameId" name="newUsername" placeholder="Nouveau Pseudo" required>
  </div>

  <div class="form-group">
    <label for="confirmNewUsernameId">Confirmation nouveau pseudo</label>
    <input type="text" class="form-control" id="confirmNewUsernameId" name="confirmNewUsername" placeholder="Confirmation nouveau Pseudo" required>
  </div>

  <button type="submit" class="btn btn-default">Confirmer</button>

</form>

<?php $this->stop('main_content') ?>