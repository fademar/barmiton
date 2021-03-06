<?php
	
	$w_routes = array(
		// Page Home
		['GET|POST', '/', 'Default#home', 'default_home'],

		// Page liste cockctail
		['GET|POST', '/cocktails/', 'Cocktails#showcocktails', 'cocktails_showcocktails'],

		// Page de recherche
		['GET|POST', '/recherche/', 'Recherche#searchform', 'recherche_searchform'],

		// Page fiche cocktail
		['GET|POST', '/cocktails/[:id]', 'Cocktails#afficherCocktail', 'cocktails_afficher_cocktail'],


		// Page alcools
		['GET|POST', '/data/alcools/', 'Autocomplete#autoCompleteAlcools', 'autocomplete_alcools'],

		// Page softs
		['GET|POST', '/data/softs/', 'Autocomplete#autoCompleteSofts', 'autocomplete_softs'],

		// Page fruits
		['GET|POST', '/data/fruits/', 'Autocomplete#autoCompleteFruits', 'autocomplete_fruits'],

		// Page epices
		['GET|POST', '/data/epices/', 'Autocomplete#autoCompleteEpices', 'autocomplete_epices'],

		// Page divers
		['GET|POST', '/data/divers/', 'Autocomplete#autoCompleteDivers', 'autocomplete_divers'],

		// Page alcools principaux
		['GET|POST', '/data/alcoolsprincipaux/', 'Autocomplete#autoCompletePrincipaux', 'autocomplete_alcoolsprincipaux'],

		// Page nom cocktails
		['GET|POST', '/data/noms/', 'Autocomplete#autoCompleteNoms', 'autocomplete_noms'],

		['GET', '/data/errors/', 'Users#generateErrors', 'users_generateerrors'],

		// Page d'inscription
		['GET|POST', '/Users/inscription/', 'Users#UsersInscription', 'Users_UsersInscription'],

		// Page de connexion
		['GET|POST', '/Users/connexion/', 'Users#UsersConnexion', 'Users_UsersConnexion'],

		// bouton de déconnexion
		['GET|POST', '/Users/deconnexion/', 'Users#UsersDeconnexion', 'Users_UsersDeconnexion'],

		// Page profil
		['GET|POST', '/Users/profil/', 'Users#UsersProfil', 'Users_UsersProfil'],

		// Page changement mot de passe
		['GET|POST', '/Users/changepassword/', 'Users#ChangePassword', 'Users_ChangePassword'],

		// Page changement pseudo
		['GET|POST', '/Users/changeusername/', 'Users#ChangeUsername', 'Users_ChangeUsername'],

		// Page favoris
		['GET|POST', '/Users/favoris/', 'Favoris#showFavoris', 'Favoris_showFavoris'],

		// Routes Back-office
		['GET|POST', '/admin/', 'Admin#admin', 'admin_admin'],

		['GET|POST', '/admin/modifcocktail/[:idcocktail]/', 'Admin#modifierCocktail', 'admin_modifierCocktail'],

		['GET|POST', '/admin/modifrecette/[:idcocktail]/', 'Admin#modifierRecette', 'admin_modifierRecette'],

		['GET|POST', '/admin/cocktails/', 'Admin#admincocktails', 'admin_admincocktails'],

		// Page gestion des membres
		['GET|POST', '/Admin/gestionmembres/', 'Admin#gestionmembre', 'Admin_gestionMembre'],

		// Page de modification des membres
		['GET|POST', '/Admin/modifier_membre/[:id]', 'Admin#modifierMembre', 'Admin_modifier_membre'],

		// Page de suppression du membre
		['GET|POST', '/Admin/supprimer_membre/[:id]', 'Admin#supprimerMembre', 'Admin_supprimer_membre'],
	
		['GET|POST', '/contact/', 'Contact#envoieEmail', 'contact_envoieEmail'],
		['GET|POST', '/contact/confirm/', 'Contact#confirmEmail', 'contact_confirmEmail'],


		['GET|POST', '/outils/', 'Outils#showOutils', 'outils_showoutils'],
		['GET|POST', '/outils/[:id]', 'Outils#showFicheOutil', 'outils_showficheoutil'],

		// Page a propos
		['GET|POST', '/about/', 'About#aPropos', 'about_aPropos']


	);
