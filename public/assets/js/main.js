$(document).ready(function() {

	$(':radio').change( 
		function(){ 
			$('.choice').text( 
				$(this).val() + ' stars' );
  	}); 

	$('[data-toggle="tooltip"]').tooltip();


	$('[data-toggle="popover"]').popover()

	$('#favouritebtn').popover();

	$('#confirmFavoris').click(function() {

			$.dialog({
		    title: 'Cocktail ajouté !',
		    content: 'Ce cocktail a été ajouté à vos favoris !',
		    autoClose: 'cancel|2000',
		    
		});

	});


	$('#confirmNotation').click(function() {

			$.dialog({
		    title: 'Cocktail noté !',
		    content: 'Merci d\'avoir donné votre avis sur ce cocktail !',
		    autoClose: 'cancel|2000',
		    
		});

	});




	// Tri des tableaux dans le back-office

	$('.sortable').bootstrapSortable;













}); // Fin Document Ready