<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],
		['GET|POST', '/recherche/', 'Recherche#searchform', 'recherche_searchform'],
		['GET', '/cocktails/[:id]', 'Cocktails#afficherCocktail', 'cocktails_afficher_cocktail'],

	);