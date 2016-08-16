$(document).ready(function() {
		
	function autocomplete() {

		var alcoolsprincipaux = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/alcoolsprincipaux/',
		  				cache:false
					}	  
		});


		var alcools = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/alcools/',
		  				cache:false

					}	  
		});

		var softs = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/softs/',
		  				cache:false

					}
		});

		var fruits = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/fruits/',
		  				cache:false
					}
		});

		var epices = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/epices/',
		  				cache:false
					}
		});

		var divers = new Bloodhound({
		  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ingredient'),
		  queryTokenizer: Bloodhound.tokenizers.whitespace,
	      identify: function(obj) { return obj.id; },
		  prefetch: {
		  				url:'data/divers/',
		  				cache:false
					}
		});
		
		alcoolsprincipaux.initialize();
		alcools.initialize();
		softs.initialize();
		fruits.initialize();
		epices.initialize();
		divers.initialize();

		$('.typeaheadhome').typeahead({
		  minLength: 2,
		  highlight: true
		},
		{
		  name: 'alcoolsprincipaux',
		  display: 'ingredient',
		  source: alcoolsprincipaux,
		  limit:10,
		  templates: {
		    header: '<h3 class="league-name">Alcools principaux</h3>',
		  }
		},
		{
		  name: 'alcools',
		  display: 'ingredient',
  		  limit:10,
		  source: alcools,
		  templates: {
		    header: '<h3 class="league-name">Alcools</h3>',
		  }
		},
		{
		  name: 'softs',
		  display: 'ingredient',
		  source: softs,
		  limit:10,
		  templates: {
		    header: '<h3 class="league-name">Softs</h3>',
		  }
		},
		{
		  name: 'fruits',
		  display: 'ingredient',
		  source: fruits,
		  limit:10,
		  templates: {
		    header: '<h3 class="league-name">Fruits</h3>',
		  }
		},
		{
		  name: 'epices',
		  display: 'ingredient',
		  source: epices,
  		  limit:10,
		  templates: {
		    header: '<h3 class="league-name">Epices</h3>',
		  }
		},
		{
		  name: 'divers',
		  display: 'ingredient',
		  source: divers,
		  limit:10,		  
		  templates: {
		    header: '<h3 class="league-name">Divers</h3>',
		  }
		});

		$('#ingredient1').on('typeahead:select', function(ev, suggestion) {	
    		$('#ingredientId1').val(suggestion.id);
  		});
		
		$('#ingredient2').on('typeahead:select', function(ev, suggestion) {	
    		$('#ingredientId2').val(suggestion.id);
  		});

  		$('#ingredient3').on('typeahead:select', function(ev, suggestion) {	
    		$('#ingredientId3').val(suggestion.id);
  		});    

	}


	autocomplete();

	//////////////////////////////////////// Ajout d'un champ de recherche //////////////////////////////////////////
 
	var maxField = 3; // Limite de nombre de champs
    var btnajouter = $('.btn-ajouter'); // Bouton ajouter
    var fieldcontainer = $('.fieldcontainer'); // Conteneur de champ
    var i = 2;
    $(btnajouter).on('click', function(){
        if(i <= maxField){
            var fieldHTML = '<div><input id="ingredient'+ i +'" class="typeaheadhome" type="text" placeholder=""><a href="javascript:void(0);" class="btn-remove" title="supprimer un champ"><i class="fa fa-times"></i></a></div>'; //Nouveau champ html 
            
            $(fieldcontainer).append(fieldHTML); // Add field html        	
        	
        	var resultHTML = '<div><input id="ingredientId'+ i +'" type="hidden" name="ingredients[]"></div>'

        	$('.results').append(resultHTML);

        	$('.typeaheadhome').typeahead('destroy');
        	autocomplete();
        	i++;
        }
    });

    $(fieldcontainer).on('click', '.btn-remove', function(event){ //Once remove button is clicked
        event.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        var fieldresult = '#ingredientId' + i; 
        $(fieldresult).parent('div').remove();
        i--; //Decrement field counter
    });
    

});	

