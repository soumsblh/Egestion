<?php

	$w_routes = array(

		['GET', '/', 'Default#home', 'default_home'],//page d'acceuil

		['GET|POST', '/frontpage', 'default#login', 'default_frontPage'],//page d'acceuil après avoir cliqué sur la Bienvenus

		//Dans le fichier je Crée le controller SecurityController
		['GET|POST', '/login'   , 'Security#login'   , 'security_login'],    //connexion
		['GET|POST', '/register', 'Security#register', 'security_register'], //inscription
		['GET|POST', '/logout'  , 'Security#logout'  , 'security_logout'],   //deconnexion
		['GET|POST', '/forget'  , 'Security#forget'  , 'security_forget'],   //mot de passe oublié


		//Dans le fichier je Crée le controller EmpruntController
		['GET|POST', '/emprunt/[i:page]?/'   , 'emprunt#index' , 'emprunt_index'],  //afficher un emprunt*
		['GET|POST', '/emprunt/create'       , 'emprunt#create', 'emprunt_create'], //add un emprunt*
		['GET|POST', '/emprunt/update/[i:id]', 'emprunt#update', 'emprunt_update'], //modifie un emprunt
		['GET|POST', '/emprunt/delete/[i:id]', 'emprunt#delete', 'emprunt_delete'], //supprime un emprunt
		['GET|POST', '/emprunt/[i:id]'       , 'emprunt#view' , 'emprunt_view'  ], //affiche un seule event precis (avec l'id)
		['GET|POST', '/emprunt/search'       , 'emprunt#searching' , 'emprunt_search'  ],

		//Dans le fichier je Crée le controller ProfilController
		['GET|POST', '/profile/?[i:id]?'        , 'Default#profile'      , 'default_profile'], //affiche la page profil
		['GET|POST', '/profile/changeInfos'     , 'Security#changeInfos' , 'security_changeInfos'], //permet à l'utilisateur de changer ses infos
		['GET|POST', '/profile/admin'           , 'Default#profileAdmin' , 'default_profile_admin'], //affiche la page profil admin
		['GET|POST', '/profile/admin/userslist' , 'Default#userslist'    , 'default_userslist'], //affiche la liste des utilisateurs depuis le panel admin
		['GET|POST', '/profile/admin/equipement' , 'Default#equipement'    , 'default_equipement'], //affiche la liste des utilisateurs depuis le panel admin
		['GET|POST', '/profile/admin/emprunteur' , 'Default#emprunteur'    , 'default_emprunteur'], //affiche la liste des utilisateurs depuis le panel admin


	);
