$(document).ready(function() {
	console.log("ready");

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();




    $('#test').autocomplete({
    	source : "assets/sources/listenoms.php",
    	minLength: 1,
	});













});

