<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],
		['GET|POST', '/recherche/', 'Recherche#searchform', 'recherche_searchform'],
		['GET|POST', '/cocktails/[:id]', 'Cocktails#afficherCocktail', 'cocktails_afficher_cocktail'],
		['GET|POST', '/data/alcools/', 'Autocomplete#autoCompleteAlcools', 'autocomplete_alcools'],
		['GET|POST', '/data/softs/', 'Autocomplete#autoCompleteSofts', 'autocomplete_softs'],
		['GET|POST', '/data/fruits/', 'Autocomplete#autoCompleteFruits', 'autocomplete_fruits'],
		['GET|POST', '/data/epices/', 'Autocomplete#autoCompleteEpices', 'autocomplete_epices'],
		['GET|POST', '/data/divers/', 'Autocomplete#autoCompleteDivers', 'autocomplete_divers'],
		['GET|POST', '/data/alcoolsprincipaux/', 'Autocomplete#autoCompletePrincipaux', 'autocomplete_alcoolsprincipaux'],
		['GET|POST', '/data/noms/', 'Autocomplete#autoCompleteNoms', 'autocomplete_noms'],
		['GET|POST', '/users/inscription/', 'Users#UsersInscription', 'Users_UsersInscription'],
		['GET|POST', '/users/connexion/', 'Users#UsersConnexion', 'Users_UsersConnexion'],
		['GET|POST', '/users/deconnexion/', 'Users#UsersDeconnexion', 'Users_UsersDeconnexion'],
		['GET|POST', '/users/profil/', 'Users#UsersProfil', 'Users_UsersProfil'],
<<<<<<< HEAD
		['GET|POST', '/admin/', 'Admin#admin', 'admin_admin'],
		['GET|POST', '/admin/cocktails/', 'Admin#admincocktails', 'admin_admincocktails'],
		['GET|POST', '/admin/cocktails/[:id]/', 'Admin#modifcocktail', 'admin_modifcocktail'],

=======
>>>>>>> origin/travail-pierre-fiche-cocktail_1808
	);