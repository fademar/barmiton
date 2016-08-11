<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?= $this->e($title) ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= $this->assetUrl('css/vendor/materialize.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/hamburgers.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/jquery-ui.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/jquery-ui.structure.min.css') ?>" rel="stylesheet" media="screen,projection"/>
    <link href="<?= $this->assetUrl('css/vendor/jquery-ui.theme.min.css') ?>" rel="stylesheet" media="screen,projection"/>
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
                    <li><a href="users/inscription/">S'inscrire</a></li>
                    <li><a href="users/connexion/">Se connecter</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= $this->assetUrl('css/materialize.css') ?>" rel="stylesheet" media="screen,projection"/>
  <link href="<?= $this->assetUrl('css/style.css') ?>" rel="stylesheet" media="screen,projection"/>

  

</head>
<body>

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '564281287093366',
        xfbml      : true,
        version    : 'v2.7'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>

  <script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
      console.log('statusChangeCallback');
      console.log(response);
      // The response object is returned with a status field that lets the
      // app know the current login status of the person.
      // Full docs on the response object can be found in the documentation
      // for FB.getLoginStatus().
      if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
      } else if (response.status === 'not_authorized') {
        // The person is logged into Facebook, but not your app.
        document.getElementById('status').innerHTML = 'Please log ' +
          'into this app.';
      } else {
        // The person is not logged into Facebook, so we're not sure if
        // they are logged into this app or not.
        document.getElementById('status').innerHTML = 'Please log ' +
          'into Facebook.';
      }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }

    window.fbAsyncInit = function() {
    FB.init({
      appId      : '564281287093366',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.5' // use graph api version 2.5
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

    };

    // Load the SDK asynchronously
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        document.getElementById('status').innerHTML =
          'Thanks for logging in, ' + response.name + '!';
      });
    }
  </script>

  <div
    class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
  </div>

  <div id="status">
  </div>

  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>


  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Barmiton</a>

      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </nav>
  
  <?= $this->section('main_content') ?>

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


    <!--  Scripts-->
    <script src="<?= $this->assetUrl('js/vendor/jquery-3.1.0.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/jquery-ui.custom.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/snap.svg.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/vendor/materialize.min.js') ?>"></script>
    <script src="<?= $this->assetUrl('js/main.js') ?>"></script>

</body>
</html>
