<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/vendor/bootstrap/bootstrap.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/bootstrap/bootstrap-theme.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <a  class="navbar-brand" href="<?= $this->url("default_home"); ?>">Barmiton</a>
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
        </div>

        <?= $this->section('main_content') ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <ul>
                            <li><a href="#!">Mentions légales</a></li>
                            <li><a href="#!">Contact</a></li>
                            <li><a href="#!">Plan du site</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <h5 >Company Bio</h5>
                        <p>We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        &copy; Barmiton - 2016
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!--  Scripts vendor-->
    <script src="<?= $this->assetUrl('js/vendor/jquery-3.1.0.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/bootstrap/npm.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/typeahead/typeahead.bundle.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/snap.svg.js') ?>"></script>
    <!-- Scripts perso -->
    <script src="<?= $this->assetUrl('js/functions.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/svg.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>
</html>
