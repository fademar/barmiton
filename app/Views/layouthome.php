<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <meta name="google-signin-scope" content="profile email"> -->
    <!-- <meta name="google-signin-client_id" content="1064140416057-ac0a4g0drkpjjn4v82lj64itcm858nrl.apps.googleusercontent.com"> -->

    <title><?= $this->e($title) ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Age Verification CSS -->
    <link href="<?= $this->assetUrl('css/age-verification.css') ?>" rel="stylesheet">

    <!-- Date picker CSS -->
    <link href="<?= $this->assetUrl('css/bootstrap-datepicker3.css') ?>" rel="stylesheet">

    <!-- Login CSS -->
    <link href="<?= $this->assetUrl('css/login-register.css') ?>" rel="stylesheet">

    <!-- Hipsters Cards CSS -->
    <link href="<?= $this->assetUrl('css/hipster_cards.css') ?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?= $this->assetUrl('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <!-- CSS principal -->
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Mettre API Google connect -->
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->

</head>
<body>

    <!-- Navigation -->

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
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
                    <li>
                        <a href="<?= $this->url('cocktails_showcocktails') ?>">Recettes</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('outils_showoutils') ?>">Bar-à-outils</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('about_aPropos') ?>">&Agrave; propos</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('contact_envoieEmail') ?>">Contact</a>
                    </li>

                    <?php if (empty($w_user)) : ?>
                    <li>
                        <a data-toggle="modal" href="#connexion">Se connecter</a>
                    </li>
                    <?php else : ?>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $w_user['Prenom']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu"> 
                            <?php if ($w_user['role'] == 1) { echo '<li><a href="'. $this->url('admin_admin') . '">Back-office</a></li>';} ?>
                            <li><a href="<?= $this->url('Users_UsersProfil') ?>">Mon profil</a></li>
                            <li><a href="<?= $this->url('Favoris_showFavoris') ?>">Mes favoris</a></li>
                            <li><a href="<?= $this->url('Users_UsersDeconnexion')  . '?url=' . $_SERVER['REDIRECT_URL'] ?>">Se déconnecter</a></li>
                          
                        </ul>
                    </li>
                    <?php endif ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <?= $this->section('main_content') ?>

   <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                        <p>L'abus d'alcool est dangereux pour la santé. &Agrave; consommer avec modération.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Barmiton 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



 <!-- Modal -->
<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="connexion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <h2>Connectez-vous à votre compte</h2>
        <hr class="star-primary">
        <form method="POST" action="Users/connexion/">

            <div class="form-group">
                <label for="emailId">Email</label>
                <input class="form-control" type="email" id="emailId" name="email" required>
            </div>

            <div class="form-group">
                <label for="motDePasseId">Mot de passe</label>
                <input class="form-control" type="password" id="motDePasseId" name="motDePasse" required>
            </div>


       <p>Pas encore de compte, <a href="<?= $this->url('Users_UsersInscription') ?>">inscrivez-vous</a> !</p>

      </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
                <input type="hidden" name="url" value="<?= $_SERVER['REDIRECT_URL'] ?>" >

                </div>
              </div>
        </form>                
    </div>
  </div>
</div>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>    
    
    <!-- JQuery UI <-->
    <script src="<?= $this->assetUrl('js/jquery-ui.custom.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Jquery Cookie -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> 

    <!-- Age verification JS -->
    <script src="<?= $this->assetUrl('js/age-verification.js') ?>"></script>

     <!-- Login JS -->
    <script src="<?= $this->assetUrl('js/login-register.js') ?>"></script>

   <!-- Datepicker JS -->
    <script src="<?= $this->assetUrl('js/bootstrap-datepicker.fr.min.js') ?>"></script>

    <!-- Moteur de recherche de la home -->

    <!-- Bloodhound JS -->
    <script src="<?= $this->assetUrl('js/bloodhound.min.js') ?>"></script>

    <!-- handlebars JS -->
    <script src="<?= $this->assetUrl('js/handlebars.min.js') ?>"></script>

    <!-- Typeahead JS -->
    <script src="<?= $this->assetUrl('js/typeahead.jquery.min.js') ?>"></script>

    <!-- Autocomplete du Typeahead -->
    <script src="<?= $this->assetUrl('js/autocomplete.js') ?>"></script>

    <!-- SVG de la home -->

    <!-- Snap SVG JS -->
    <script src="<?= $this->assetUrl('vendor/snap/snap.svg-min.js') ?>"></script>

    <!-- Functions JS -->
    <script src="<?= $this->assetUrl('js/functions.js') ?>"></script>
    
    <!-- Création du SVG de la home -->
    <script src="<?= $this->assetUrl('js/svg.js') ?>"></script>
    
    <!-- Hipsters Cards JS -->
    <script src="<?= $this->assetUrl('js/hipster-cards.js') ?>"></script>

    <!-- Match Height JS -->
    <script src="<?= $this->assetUrl('js/jquery.matchHeight-min.js') ?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?= $this->assetUrl('js/theme.min.js') ?>"></script>

    <!-- Main -->
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>

</html>
