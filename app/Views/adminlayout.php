<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?= $this->e($title) ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    
    <!-- Bootstrap Table sorter -->
    <link href="<?= $this->assetUrl('css/bootstrap-sortable.css') ?>" rel="stylesheet">
    
    <!-- Animation library for notifications   -->
    <link href="<?= $this->assetUrl('css/admin/animate.min.css') ?>" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?= $this->assetUrl('css/admin/paper-dashboard.css') ?>" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= $this->assetUrl('css/admin/themify-icons.css') ?>" rel="stylesheet">

</head>
<body>

	

    <?= $this->section('main_content') ?>



</body>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>    
    
    <!-- JQuery UI <-->
    <script src="<?= $this->assetUrl('js/jquery-ui.custom.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    
    <!-- Bootstrap Sortable -->
    <script src="<?= $this->assetUrl('js/bootstrap-sortable.js') ?>"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?= $this->assetUrl('js/admin/bootstrap-checkbox-radio.js') ?>"></script>

	<!--  Charts Plugin -->
	<script src="<?= $this->assetUrl('js/admin/chartist.min.js') ?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?= $this->assetUrl('js/admin/bootstrap-notify.js') ?>"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?= $this->assetUrl('js/admin/paper-dashboard.js') ?>"></script>



</html>
