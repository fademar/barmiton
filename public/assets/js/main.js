$(document).ready(function() {
	console.log("ready");



	function autocomplete() {

		var alcoolsprincipaux = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/alcoolsprincipaux/',
						cache: false
					}	  
		});


		var alcools = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/alcools/',
						cache: false
					}	  
		});

		var softs = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/softs/',
						cache: false
					}
		});

		var fruits = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/fruits/',
						cache: false
					}
		});

		var epices = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/epices/',
						cache: false
					}
		});

		var divers = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredients'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
		  prefetch: {
		  				url:'data/divers/',
						cache: false
					}
		});
		
		alcoolsprincipaux.initialize();
		alcools.initialize();
		softs.initialize();
		fruits.initialize();
		epices.initialize();
		divers.initialize();

		$('.typeahead').typeahead({
		  minLength: 2,
		  highlight: true
		},
		{
		  name: 'alcoolsprincipaux',
		  display: 'ingredients',
		  source: alcoolsprincipaux,
		  templates: {
		    header: '<h3 class="league-name">Alcools principaux</h3>'
		  }
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

	};


	autocomplete();

// Ajout d'un champ de recherche

	var maxField = 5; // Limite de nombre de champs
    var btnajouter = $('.btn-ajouter'); // Bouton ajouter
    var fieldcontainer = $('.fieldcontainer'); // Conteneur de champ
    var fieldHTML = '<div><input class="typeahead" type="text" name="ingredients[]" value="" placeholder=""><a href="javascript:void(0);" class="btn-remove" title="supprimer un champ"><i class="fa fa-times"></i></a></div>'; //Nouveau champ html 
    var i = 1; //Initialisation du compteur de champ
    $(btnajouter).on('click', function(){
        if(i < maxField){
            i++;
            $(fieldcontainer).append(fieldHTML); // Add field html
        	
        	$('.typeahead').typeahead('destroy');
        	autocomplete();

        }
    });

    $(fieldcontainer).on('click', '.btn-remove', function(event){ //Once remove button is clicked
        event.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        i--; //Decrement field counter
    });





















}); // Fin Document Ready