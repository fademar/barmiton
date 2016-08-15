<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?= $this->e($title) ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/vendor/bootstrap/bootstrap.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/bootstrap/bootstrap-theme.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/materialize.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <div class="navbar-fixed">
        <nav class="vert" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="<?= $this->url("default_home"); ?>" class="brand-logo">Barmiton</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#">&Agrave; propos</a></li>
                    <li><a href="<?= $this->url("cocktails_showcocktails");?> ">Cocktails</a></li>
                    <li><a href="#">S'inscrire</a></li>
                    <li><a href="#">Se connecter</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    <?= $this->section('main_content') ?>

    <footer class="page-footer teal lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <ul>
                        <li><a class="white-text" href="#!">Mentions légales</a></li>
                        <li><a class="white-text" href="#!">Contact</a></li>
                        <li><a class="white-text" href="#!">Plan du site</a></li>
                    </ul>
                </div>
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center">
                &copy; Barmiton - 2016
            </div>
        </div>
    </footer>


    <!--  Scripts vendor-->
    <script src="<?= $this->assetUrl('js/vendor/jquery-3.1.0.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/bootstrap/npm.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/typeahead/typeahead.bundle.min.js') ?>"></script>
    <!-- Scripts perso -->
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>
</html>
