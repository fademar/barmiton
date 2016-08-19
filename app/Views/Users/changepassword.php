<?php $this->layout('layout', ['title' => 'Changer votre pseudo']) ?>

<?php $this->start('main_content') ?>

<h2>Changer votre mot de passe :</h2>

<form method="POST">

  <div class="form-group">
    <label for="newMotDePasse">Nouveau mot de passe</label>
    <input type="password" class="form-control" id="newMotDePasseId" name="newMotDePasse" placeholder="Mot de passe" required>
  </div>

  <div class="form-group">
    <label for="confirmNewMotDePasse">Confirmation nouveau mot de passe</label>
    <input type="password" class="form-control" id="confirmNewMotDePasseId" name="confirmNewMotDePasse" placeholder="Nouveau mot de passe" required>
  </div>
  
  <button type="submit" class="btn btn-default">Confirmer</button>

</form>

<?php $this->stop('main_content') ?>