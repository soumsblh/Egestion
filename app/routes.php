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
		['GET|POST', '/profile/admin/emprunt/[i:page]?/'   , 'emprunt#index' , 'emprunt_index'],  //afficher un evenement*
		['GET|POST', '/emprunt/create'       , 'emprunt#create', 'emprunt_create'], //add un emprunt*
		['GET|POST', '/emprunt/update/[i:id]', 'emprunt#update', 'emprunt_update'], //modifie un emprunt

		//affiche la page profil utilisateur normal
		['GET|POST', '/profile/?[i:id]?'        , 'Default#profile'      , 'default_profile'], 
		
		 //permet à l'utilisateur de changer ses infos
		['GET|POST', '/profile/changeInfos'     , 'Security#changeInfos' , 'security_changeInfos'],
		
		//affiche la page profil admin		
		['GET|POST', '/profile/admin'           , 'Default#profileAdmin' , 'default_profile_admin'], 
		
		//affiche la liste des utilisateurs depuis le panel admin
		['GET|POST', '/profile/admin/userslist' , 'Default#userslist'    , 'default_userslist'], 
		
		['GET|POST', '/profile/userslist' , 'Default#userslistuser'    , 'default_userslistuser'], 

		//Dans le fichier je Crée le controller EquipementController
		['GET|POST', '/profile/admin/equipement' , 'Equipement#equipement'    , 'equipement_equipement'], 
		['GET|POST', '/equipement/Newequipement' , 'Equipement#Newequipement'    , 'equipement_Newequipement'], 

		//affiche la liste des emprunteurs depuis le panel admin
		['GET|POST', '/profile/admin/emprunteur' , 'Emprunt#emprunteur'    , 'emprunt_emprunteur'], 
	);
