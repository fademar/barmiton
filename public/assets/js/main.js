$(document).ready(function() {
	console.log("ready");



	var alcools = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	  				url:'data/alcools/',
					cache: false
				}	  
	});

	console.log(alcools);

	var softs = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	  				url:'data/softs/',
					cache: false
				}
	});

	console.log(softs);

	var fruits = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	  				url:'data/fruits/',
					cache: false
				}
	});
	console.log(fruits);

	var epices = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	  				url:'data/epices/',
					cache: false
				}
	});
	console.log(epices);

	var divers = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	  				url:'data/divers/',
					cache: false
				}
	});

	console.log(divers);



	alcools.initialize();
	softs.initialize();
	fruits.initialize();
	epices.initialize();
	divers.initialize();

	$('#multiple-datasets .typeahead').typeahead({
	  highlight: true
	},
	{
	  name: 'alcools',
	  display: 'ingredients',
	  source: alcools,
	  templates: {
	    header: '<h3 class="league-name">Alcools</h3>'
	  }
	},
	{
	  name: 'softs',
	  display: 'ingredients',
	  source: softs,
	  templates: {
	    header: '<h3 class="league-name">Softs</h3>'
	  }
	},
	{
	  name: 'fruits',
	  display: 'ingredients',
	  source: fruits,
	  templates: {
	    header: '<h3 class="league-name">Fruits</h3>'
	  }
	},
	{
	  name: 'epices',
	  display: 'ingredients',
	  source: epices,
	  templates: {
	    header: '<h3 class="league-name">Epices</h3>'
	  }
	},
	{
	  name: 'divers',
	  display: 'ingredients',
	  source: divers,
	  templates: {
	    header: '<h3 class="league-name">Divers</h3>'
	  }
	});

























}); // Fin Document Ready