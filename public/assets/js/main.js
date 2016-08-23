$(document).ready(function() {

	$(':radio').change( 
		function(){ 
			$('.choice').text( 
				$(this).val() + ' stars' );
  	}); 


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



	var totalpage = $('input#nbpages').val();
	var query = $('input#querypage').val();


	$('.pagination').twbsPagination({
        totalPages: totalpage,
        visiblePages: 10,
        href: '?' + query + '&page={{number}}'
    });






	// Tri des tableaux dans le back-office

	$('.sortable').bootstrapSortable;



	$( ".searchtrigger" ).click(function() {
	  $( ".divsearch" ).slideToggle(function() {

	  	$("i").toggleClass("fa-arrow-circle-o-down fa-arrow-circle-o-up");


	  });
	});








}); // Fin Document Ready