<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1064140416057-ac0a4g0drkpjjn4v82lj64itcm858nrl.apps.googleusercontent.com">

    <title><?= $this->e($title) ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->assetUrl('vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

    <!-- Custom Fonts -->
    <link href="<?= $this->assetUrl('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

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

    <!-- <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div> -->


  <script>
    // function onSignIn(googleUser) {
    // // Useful data for your client-side scripts:
    // var profile = googleUser.getBasicProfile();
    // console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    // console.log('Full Name: ' + profile.getName());
    // console.log('Given Name: ' + profile.getGivenName());
    // console.log('Family Name: ' + profile.getFamilyName());
    // console.log("Image URL: " + profile.getImageUrl());
    // console.log("Email: " + profile.getEmail());

    // // The ID token you need to pass to your backend:
    // var id_token = googleUser.getAuthResponse().id_token;
    // console.log("ID Token: " + id_token);
    // };

  </script>

  <!-- <a href="#" onclick="signOut();">Sign out</a> -->

  <script>
    // function signOut()
    // {
    //   var auth2 = gapi.auth2.getAuthInstance();
    //   auth2.signOut().then(function ()
    //   {
    //     console.log('User signed out.');
    //   });
    // }
  </script>

  <script>
    // window.fbAsyncInit = function()
    // {
    //   FB.init({
    //   appId      : '564281287093366',
    //   xfbml      : true,
    //   version    : 'v2.7'
    //   });
    // };

    // (function(d, s, id)
    // {
    //   var js, fjs = d.getElementsByTagName(s)[0];
    //   if (d.getElementById(id)) {return;}
    //   js = d.createElement(s); js.id = id;
    //   js.src = "//connect.facebook.net/en_US/sdk.js";
    //   fjs.parentNode.insertBefore(js, fjs);
    // }
    // (document, 'script', 'facebook-jssdk'));
  </script>

  <script>
    // // This is called with the results from from FB.getLoginStatus().
    // function statusChangeCallback(response) {
    //   console.log('statusChangeCallback');
    //   console.log(response);
    //   // The response object is returned with a status field that lets the
    //   // app know the current login status of the person.
    //   // Full docs on the response object can be found in the documentation
    //   // for FB.getLoginStatus().
    //   if (response.status === 'connected') {
    //     // Logged into your app and Facebook.
    //     testAPI();
    //   } else if (response.status === 'not_authorized') {
    //     // The person is logged into Facebook, but not your app.
    //     document.getElementById('status').innerHTML = 'Please log ' +
    //       'into this app.';
    //   } else {
    //     // The person is not logged into Facebook, so we're not sure if
    //     // they are logged into this app or not.
    //     document.getElementById('status').innerHTML = 'Please log ' +
    //       'into Facebook.';
    //   }
    // }

    // // This function is called when someone finishes with the Login
    // // Button.  See the onlogin handler attached to it in the sample
    // // code below.
    // function checkLoginState() {
    //   FB.getLoginStatus(function(response) {
    //     statusChangeCallback(response);
    //   });
    // }

    // window.fbAsyncInit = function() {
    // FB.init({
    //   appId      : '564281287093366',
    //   cookie     : true,  // enable cookies to allow the server to access 
    //                       // the session
    //   xfbml      : true,  // parse social plugins on this page
    //   version    : 'v2.5' // use graph api version 2.5
    // });

    // // Now that we've initialized the JavaScript SDK, we call 
    // // FB.getLoginStatus().  This function gets the state of the
    // // person visiting this page and can return one of three states to
    // // the callback you provide.  They can be:
    // //
    // // 1. Logged into your app ('connected')
    // // 2. Logged into Facebook, but not your app ('not_authorized')
    // // 3. Not logged into Facebook and can't tell if they are logged into
    // //    your app or not.
    // //
    // // These three cases are handled in the callback function.

    // FB.getLoginStatus(function(response) {
    //   statusChangeCallback(response);
    // });

    // };

    // // Load the SDK asynchronously
    // (function(d, s, id) {
    //   var js, fjs = d.getElementsByTagName(s)[0];
    //   if (d.getElementById(id)) return;
    //   js = d.createElement(s); js.id = id;
    //   js.src = "//connect.facebook.net/en_US/sdk.js";
    //   fjs.parentNode.insertBefore(js, fjs);
    // }(document, 'script', 'facebook-jssdk'));

    // // Here we run a very simple test of the Graph API after login is
    // // successful.  See statusChangeCallback() for when this call is made.
    // function testAPI() {
    //   console.log('Welcome!  Fetching your information.... ');
    //   FB.api('/me', function(response) {
    //     console.log('Successful login for: ' + response.name);
    //     document.getElementById('status').innerHTML =
    //       'Thanks for logging in, ' + response.name + '!';
    //   });
    // }
  </script>

<!--   <div
    class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
  </div> -->

  <!-- <div id="status"></div> -->

  <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button> -->
  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
    <!-- Navigation -->

    <nav id="mainNav" class="navbar navbar-default  navbar-fixed-top  navbar-custom">

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
                    <li class="page-scroll">
                        <a href="#">Profil</a>
                    </li>
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
                        <h3>Barmiton</h3>
                        <p>Barmiton est le projet de fin de formation de Pierre Météyé, Thibault Pezeron et Fabrice Demarthon, étudiants à l'Ecole Webforce3.</p>
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

    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>    
   
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $this->assetUrl('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-fr_FR.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?= $this->assetUrl('js/jqBootstrapValidation.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/contact_me.js') ?>"></script>

    <!-- Infinite scroll Ajax -->
    <script src="<?= $this->assetUrl('js/jquery-ias.min.js') ?>"></script>

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

