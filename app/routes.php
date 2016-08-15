<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/users/inscription/', 'Users#UsersInscription', 'Users_UsersInscription'],
		['GET|POST', '/users/connexion/', 'Users#UsersConnexion', 'Users_UsersConnexion'],
		['GET|POST', '/users/deconnexion/', 'Users#UsersDeconnexion', 'Users_UsersDeconnexion'],
		['GET|POST', '/users/profil/', 'Users#UsersProfil', 'Users_UsersProfil'],
	);