	<!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Barmiton</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?= $this->url('cocktails_showcocktails') ?>">Cocktails</a>
                    </li>
                    
					<?php if (!$userlog) : ?>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?= $this->url('Users_UsersConnexion') ?>">Se connecter</a></li>
                        <li><a href="<?= $this->url('Users_UsersInscription') ?>">S'inscrire</a></li>
                      </ul>
                    </li>
					
					<?php endif ?>

					<?php if ($userlog) : ?>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $username ?> <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?= $this->url('Users_UsersProfil') ?>">Mon profil</a></li>
                        <li><a href="<?= $this->url('Users_UsersFavoris') ?>">Mes favoris</a></li>
                        <li><a href="<?= $this->url('Users_UsersDeconnexion') ?>">Se déconnecter</a></li>

                      </ul>
                    </li>
					
					<?php endif ?>


                    <li class="page-scroll">
                        <a href="#">A propos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>










































