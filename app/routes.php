<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],
		['GET|POST', '/recherche[:ingredient]', 'Recherche#searchform', 'recherche_searchform'],
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
	);