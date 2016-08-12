<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/users/inscription/', 'Users#UsersInscription', 'Users_UsersInscription'],
		['GET|POST', '/users/connexion/', 'Users#UsersConnexion', 'Users_UsersConnexion'],
	);