<?php
	
$w_routes = array(
	['GET|POST', '/', 'Default#home', 'default_home'],
	['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],
	['GET|POST', '/cocktails/cocktailliste/', 'Cocktails#searchformhome', 'cocktails_resultat_searchformhome'],
	['GET|POST', '/cocktails/[:id]', 'Cocktails#afficherCocktail', 'cocktails_afficher_cocktail'],
	['GET|POST', '/users/inscription/', 'Users#UsersInscription', 'Users_UsersInscription'],
	['GET|POST', '/users/connexion/', 'Users#UsersConnexion', 'Users_UsersConnexion'],
	);
