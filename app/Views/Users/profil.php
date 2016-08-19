<?php $this->layout('layout', ['title' => 'Page profil']) ?>

<?php $this->start('main_content') ?>


<!-- Page profil -->
<section id="profil">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h2>Votre profil :</h2>
                <hr class="glass-primary">
            </div>
        </div>

        <div class="row">
            <div>
                <h3>Votre adresse mail : <?php echo $w_user['email']; ?></h3>
            </div>

            <div>
                <h3>Votre pseudo : <?php echo  $w_user['username']; ?></h3>
                <h3><a href="<?= $this->url('Users_ChangeUsername') ?>">Changer votre pseudo</a></h3>
            </div>

            <div>
                
            <h3><a href="<?= $this->url('Users_ChangePassword') ?>">Changer votre mot de passe</a></h3>
            </div>

        </div>
    </div>
</section>





<?php $this->stop('main_content') ?>