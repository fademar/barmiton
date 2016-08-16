$(document).ready(function() {

	$(':radio').change(
  function(){
    $('.choice').text( $(this).val() + ' stars' );
  } 

}); // Fin Document Ready