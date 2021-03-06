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
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

     <!-- Bootstrap Table sorter -->
    <link href="<?= $this->assetUrl('css/bootstrap-sortable.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= $this->assetUrl('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">

    <!-- CSS principal -->
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/jquery-confirm.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Mettre API Google connect -->
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Barmiton Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="<?= $this->url('admin_admin') ?>">Updates</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('admin_admincocktails') ?>">Cocktails</a>
                    </li>

                    <li>
                        <a href="<?= $this->url('Admin_gestionMembre') ?>">Membres</a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $w_user['Prenom']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu"> 
                            <li><a href="<?= $this->url('Users_UsersDeconnexion') . '?url=back_office'?>">Se déconnecter</a></li>
                          
                        </ul>
                    </li>
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
<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-center">
        <h2>Connectez-vous à votre compte</h2>
        <hr class="star-primary">
        <form method="POST" action="../Users/connexion/">

            <div class="form-group text-center">
                <label for="emailId">Email</label>
                <input class="form-control text-center" type="email" id="emailId" name="email" required>
            </div>

            <div class="form-group text-center">
                <label for="motDePasseId">Mot de passe</label>
                <input class="form-control text-center" type="password" id="motDePasseId" name="motDePasse" required>
            </div>


       <p>Pas encore de compte, <a href="<?= $this->url('Users_UsersInscription') ?>">inscrivez-vous</a> !</p>

      </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <input type="submit" class="btn btn-primary" name="connexion" value="Connexion">
                <input type="hidden" name="url" value="<?= $_SERVER['REDIRECT_URL'] ?>" >

                </div>
              </div>
        </form>                
    </div>
  </div>
</div>


    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>    
   
    <!-- JQuery UI <-->
    <script src="<?= $this->assetUrl('js/jquery-ui.custom.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    
    <!-- Jquery Cookie -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> 
    
    jquery.matchHeight-min

    <!-- Age verification JS -->
    <script src="<?= $this->assetUrl('js/age-verification.js') ?>"></script>

    <!-- Sweet alert JS -->
    <script src="<?= $this->assetUrl('js/sweetalert.min.js') ?>"></script>

     <!-- Sweet alert JS -->
    <script src="<?= $this->assetUrl('js/jquery.twbsPagination.min.js') ?>"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-fr_FR.min.js"></script>
    
    <!-- Hipsters Cards JS -->
    <script src="<?= $this->assetUrl('js/hipster-cards.js') ?>"></script>

    <!-- Match Height JS -->
    <script src="<?= $this->assetUrl('js/jquery.matchHeight-min.js') ?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?= $this->assetUrl('js/theme.min.js') ?>"></script>

    <!-- Functions JS -->
    <script src="<?= $this->assetUrl('js/functions.js') ?>"></script>

    <!-- Confirm.js -->
    <script src="<?= $this->assetUrl('js/jquery-confirm.js') ?>"></script>

    <!-- Main -->
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>



</body>

</html>

