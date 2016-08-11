<?php
	
$w_routes = array(
	['GET|POST', '/', 'Default#home', 'default_home'],
	['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],
	['GET|POST', '/cocktails/cocktailliste/', 'Cocktails#searchformhome', 'cocktails_resultat_searchformhome'],
	['GET', '/cocktails/[:id]', 'Cocktails#afficherCocktail', 'cocktails_afficher_cocktail'],
	['GET', '/cocktails/[:id]', 'Cocktails#afficherIngredients', 'cocktails_afficher_ingredients'],

);