<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/users/inscription/', 'Users#usersinscription', 'users_usersinscription'],
		['GET|POST', '/users/connexion/', 'Users#usersconnexion', 'users_usersconnexion'],
	);