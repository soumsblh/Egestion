<?php

	$w_routes = array(

		['GET', '/', 'Default#home', 'default_home'],//page d'acceuil

		['GET|POST', '/frontpage', 'default#login', 'default_frontPage'],//page d'acceuil après avoir cliqué sur la Bienvenus

		//Dans le fichier je Crée le controller SecurityController
		['GET|POST', '/login'   , 'Security#login'   , 'security_login'],    //connexion
		['GET|POST', '/register', 'Security#register', 'security_register'], //inscription d'un user
		['GET|POST', '/logout'  , 'Security#logout'  , 'security_logout'],   //deconnexion
		['GET|POST', '/forget'  , 'Security#forget'  , 'security_forget'],   //mot de passe oublié


		//Dans le fichier je Crée le controller EmpruntController
		['GET|POST', '/profile/admin/emprunt/[i:page]?/'   , 'emprunt#index' , 'emprunt_index'],  //afficher que certain emprunt*
		['GET|POST', '/emprunt/create'       , 'emprunt#create', 'emprunt_create'], //add un emprunt*
		['GET|POST', '/emprunt/update/[i:id]', 'emprunt#update', 'emprunt_update'], //modifier un emprunt

        //Dans le fichier je Crée le controller EquipementController
        ['GET|POST', '/profile/admin/equipement' , 'Equipement#equipement'    , 'equipement_equipement'],
        ['GET|POST', '/equipement/Newequipement' , 'Equipement#Newequipement'    , 'equipement_Newequipement'],

        //Dans le fichier je Crée le controller EmprunteurController
        //affiche la liste des emprunteurs depuis le panel admin
        ['GET|POST', '/profile/admin/emprunteur' , 'Emprunteur#emprunteur'    , 'emprunteur_emprunteur'],
        ['GET|POST', '/emprunteur/NewEmprunteur' , 'Emprunteur#NewEmprunteur'    , 'emprunteur_NewEmprunteur'],

		//affiche la page profil utilisateur normal
		['GET|POST', '/profile/'        , 'Default#profile'      , 'default_profile'],
        ['GET|POST', '/emprunt/createbyUser'       , 'emprunt#createbyUser', 'emprunt_createbyUser'], //add un emprunt*
		
		 //permet à l'utilisateur de changer ses infos
		['GET|POST', '/profile/changeInfos'     , 'Security#changeInfos' , 'security_changeInfos'],
		
		//affiche la page profil admin		
		['GET|POST', '/profile/admin'           , 'Default#profileAdmin' , 'default_profile_admin'], 

		//affiche la liste des utilisateurs depuis le panel admin
		['GET|POST', '/profile/admin/userslist' , 'Default#userslist'    , 'default_userslist'],


	);
