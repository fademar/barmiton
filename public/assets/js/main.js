$(document).ready(function() {

	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	var limit = new Date (now.getFullYear() - 18, nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);



	console.log(nowTemp);
	console.log(now);
	console.log(limit);

	console.log(limit.getDate());

	$('.datepicker').datepicker({
    	weekStart:1,
    	color: 'red',
    	defaultViewDate: {
    		year: 1970,
    		month: 12,
    		day: 12
  		},
    	// onRender: function(date) {
    	// 	return date.valueOf() > limit.valueOf() ? 'disabled' : '';}
	});


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

	$('#pagination').twbsPagination({
        visiblePages: 10,
    });


	// Tri des tableaux dans le back-office

	$('.sortable').bootstrapSortable;













}); // Fin Document Ready