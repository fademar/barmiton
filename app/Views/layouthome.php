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
    <link href="<?= $this->assetUrl('css/bootstrap-datepicker.css') ?>" rel="stylesheet">

    <!-- Login CSS -->
    <link href="<?= $this->assetUrl('css/login-register.css') ?>" rel="stylesheet">

    <!-- Hipsters Cards CSS -->
    <link href="<?= $this->assetUrl('css/hipster_cards.css') ?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?= $this->assetUrl('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet">

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
                        <a href="#">&Agrave; propos</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>

                    <?php if (empty($w_user)) : ?>
                    <li>
                        <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Se connecter</a>
                    </li>
                    <?php else : ?>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $w_user['Prenom']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu"> 
                            <li><a href="<?= $this->url('Users_UsersProfil') ?>">Mon profil</a></li>
                            <li><a href="<?= $this->url('Favoris_showFavoris') ?>">Mes favoris</a></li>
                            <li><a href="<?= $this->url('Users_UsersDeconnexion')  . '?url=' . $w_current_route ?>">Se déconnecter</a></li>
                          
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
                    <div class="footer-col col-md-4">
                        <h3>Contact</h3>
                        <p>18 rue Geoffroy L'Asnier
                            <br>75015 Paris</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3></h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <p>L'abus d'alcool est dangereux pour la santé.</p>
                        <p>&Agrave; consommer avec modération</p>
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



     <div class="modal fade login" id="loginModal">
          <div class="modal-dialog login animated">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Connectez-vous</h4>
                </div>
                <div class="modal-body">  
                    <div class="box">
                         <div class="content">
                            <div class="error"></div>
                            <div class="form loginBox">
                                <form method="post" action="users/connexion/" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                </form>
                            </div>
                         </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                         <div class="form">
                            <form method="post" html="{:multipart=>true}" data-remote="true" action="users/inscription/" accept-charset="UTF-8">
                                    <input class="form-control" id="usernameId" name="username" type="text" placeholder="Votre Pseudo" required>
                                    <input class="form-control" type="text" id="emailId" name="email" placeholder="Votre adresse mail" required>
                                    <input class="form-control" type="text" id="nomId" name="nom" placeholder="Votre Nom" required>
                                    <input class="form-control" id="prenomId" name="prenom" type="text" placeholder="Votre Prenom" required>
                                    <input class="datepicker form-control" type="text" id="dateNaissanceId" name="dateNaissance" placeholder="Votre Date de naissance" required>
                                    <input class="form-control" type="password" id="motDePasseId" name="motDePasse" placeholder="Votre Mot de passe" required>
                                    <input class="form-control" type="password" id="confirmMotDePasseId" name="confirmMotDePasse" placeholder="Confirmer Mot de passe" required>
                                    <input class="btn btn-default btn-register" type="submit" name="inscription" value="Inscription">
                
                           </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot login-footer">
                        <span>Pas encore de compte ? 
                             <a href="javascript: showRegisterForm();">Inscrivez-vous</a> !
                        </span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                         <span>Vous avez déjà un compte ? </span>
                         <a href="javascript: showLoginForm();">Connectez-vous.</a>
                    </div>
                </div>        
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
    <script src="<?= $this->assetUrl('js/bootstrap-datepicker.js') ?>"></script>

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
