<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->e($title) ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    
     <!-- Bootstrap Table sorter -->
    <link href="<?= $this->assetUrl('css/bootstrap-sortable.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $this->assetUrl('css/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= $this->assetUrl('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Barmiton</a>
            </div>
            <!-- Top Menu Items -->
            

        <?= $this->section('main_content') ?>

       

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>    
   
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('js/moment.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('js/bootstrap-sortable.js') ?>"></script>

    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-fr_FR.min.js"></script>


    <!-- Theme JavaScript -->
    <script src="<?= $this->assetUrl('js/admin/sb-admin-2.js') ?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?= $this->assetUrl('js/theme.min.js') ?>"></script>

    <!-- Functions JS -->
    <script src="<?= $this->assetUrl('js/functions.js') ?>"></script>

    <!-- Main -->
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>
</body>

</html>
