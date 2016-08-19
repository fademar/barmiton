<?php $this->layout('layout', ['title' => 'Changer votre pseudo']) ?>

<?php $this->start('main_content') ?>

<h2>Changer votre pseudo :</h2>

<form method="POST">

  <div class="form-group">
    <label for="newUsername">Nouveau pseudo</label>
    <input type="text" class="form-control" id="newUsernameId" name="newUsername" placeholder="Nouveau Pseudo" required>
  </div>
 
  <button type="submit" class="btn btn-default">Confirmer</button>

</form>

<?php $this->stop('main_content') ?>