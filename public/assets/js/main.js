$(document).ready(function() {
	console.log("ready");



	// $('#multiple-datasets .typeahead').typeahead({
	// 	highlight: true
	// },
	// {
	// 	name: 'alcools',
	// 	display: 'ingredients',
	// 	source: alcools,
	// 	templates: {
	// 		header: '<h3 class="ingredients">Alcools</h3>'
	// 	}
	// });
	// // },
	// // {
	// // 	name: 'softs',
	// // 	display: 'ingredients',
	// // 	source: softs,
	// // 	templates: {
	// // 		header: '<h3 class="ingredients">Softs</h3>'
	// // 	}
	// // },
	// // {
	// // 	name: 'fruits',
	// // 	display: 'ingredients',
	// // 	source: fruits,
	// // 	templates: {
	// // 		header: '<h3 class="ingredients">Fruits</h3>'
	// // 	}
	// // },
	// // {
	// // 	name: 'epices',
	// // 	display: 'ingredients',
	// // 	source: epices,
	// // 	templates: {
	// // 		header: '<h3 class="ingredients">Epices</h3>'
	// // 	}
	// // }


	$('.btn-ajouter').on('click', function() {
		console.log("click");
		
		var newform = '<div id="multiple-datasets" class="center-block"><button type="button" class="btn btn-secondary btn-ajouter">ajouter</button></div>';

		$('#inputingredients').append(newform);


	});


	$('.typeahead').typeahead([
		{
			name: 'alcools',
		  	prefetch: 'http://localhost/barmiton/public/data/alcools/',
		},
	  	{
	    	name: 'softs',
	    	prefetch: 'http://localhost/barmiton/public/data/softs/',
	  	},
		{
		    name: 'fruits',
		    prefetch: 'http://localhost/barmiton/public/data/fruits/'
		},
		{
		    name: 'épices',
		    prefetch: 'http://localhost/barmiton/public/data/epices/'
		},
	]);






}); // Fin Document Ready