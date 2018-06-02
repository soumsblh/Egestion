<?php

namespace Controller;

use Model\UserModel;
use Model\EmpruntModel;
use Model\EquipementModel;
use Model\EmprunteurModel;
use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$user_manager  = new UserModel();
        $users = $user_manager->findAll();
        $countUsers = $user_manager->countUsers();

        if ($countUsers[users] == 0)
        {
            $this->redirectToRoute('security_register');
        }elseif( $users['Id_Ecole'] == null)
        {
            $this->redirectToRoute('default_frontPage');
        };
		$logo     = $user_manager->getLogoByUser('id_Ecole');

		$this->show('default/home' ,['logo' => $logo]);
	}

	/**
	* Page de profil admin
	*/
	public function profileAdmin()
	{

		//redirection a une page d'erreur si on on n'est pas admin
		$this->allowTo('admin');


		$equipement_manager 	= new EquipementModel();
		$emprunteur_manager 	= new EmprunteurModel();
        $event_manager 	= new EmpruntModel();
		$user_manager		= new UserModel();
		$user = $user_manager->find($this->getUser()['id']);
		$events       	= $event_manager->findAll();
		$users       	= $user_manager->findAll();
		$events       	= $event_manager->countAllEvent();
		$emprunt       	= $event_manager->countAllEvent();
		$count_events 	= $event_manager->countEvents();
		$count_users 		= $user_manager->countUsers();  
		$user_list 		= $user_manager->UsersList();
		$count_list 		= $equipement_manager->countNbrEquipement();
		$count_emprunteur 	= $emprunteur_manager->countEmprunteur();

		foreach ($emprunt as $event) {

		if (isset($_POST['button-'.$event['id_Emprunt']])){
				$EtatEmprunt = $_POST['EtatEmprunt'];
				$id_Emprunt = $event['id_Emprunt'];		
				$emprunt = $event_manager->update(['EtatEmprunt' => $EtatEmprunt], $id_Emprunt);
				$DateRetour = date('Y-m-d');
				$emprunt = $event_manager->update(['DateRetour' => $DateRetour], $id_Emprunt);
				$this->redirectToRoute('default_profile_admin');
			}
		}
		$this->show('default/profileAdmin' , ['emprunt' => $events, 'user' => $user , 'users' => $users, 'count_events' => $count_events, 'count_users' => $count_users,'event'=> $event, 'user_list' => $user_list,'count_list' => $count_list,'count_emprunteur' => $count_emprunteur]);

	}


	/**
	 * Page de profil
	 */
	public function profile()
	{

   	//Ici on doit afficher les evenements liés à l'utilisateur connecté
		//si l'utilisateur n'a pas d'evenement on lui indiquera le chemin à suivre pour en créer un
		$this->allowTo(['user','admin']);
		
		$emprunteur_manager 	= new EmprunteurModel();
        $equipement_manager 	= new EquipementModel();
		$event_manager 	= new EmpruntModel();
		$user_manager		= new UserModel();
		$user = $user_manager->find($this->getUser()['id']);
		$events       	= $event_manager->findAll();
		$users       	= $user_manager->findAll();
		$events       	= $event_manager->countAllEvent();
		$emprunt       	= $event_manager->countAllEvent();
		$count_events 	= $event_manager->countEvents();
		$count_users 		= $user_manager->countUsers();  
		$user_list 		= $user_manager->UsersList();
		$count_list 		= $equipement_manager->countNbrEquipement();
		$count_emprunteur 	= $emprunteur_manager->countEmprunteur();


		foreach ($emprunt as $event) {

		if (isset($_POST['button-'.$event['id_Emprunt']])){
				$EtatEmprunt = $_POST['EtatEmprunt'];
				$id_Emprunt = $event['id_Emprunt'];		
				$emprunt = $event_manager->update(['EtatEmprunt' => $EtatEmprunt], $id_Emprunt);
				$DateRetour = date('Y-m-d');
				$emprunt = $event_manager->update(['DateRetour' => $DateRetour], $id_Emprunt);
				$this->redirectToRoute('default_profile_admin');
			}
		}
		$this->show('default/profile' , [
			'emprunt' => $events,
			 'user' => $user , 
			 'users' => $users,
			  'count_events' => $count_events,
			   'count_users' => $count_users,
			   'event'=> $event, 
			   'user_list' => $user_list,
			   'count_list' => $count_list,
			   'count_emprunteur' => $count_emprunteur
			]);

	}


	/**
	* Page pour afficher tous les utilisateurs
	*/
	public function userslist()
	{

		//redirection a une page d'erreur si on on n'est pas admin ou user
		$this->allowTo(['admin']);

        $emprunteur_manager 	= new EmprunteurModel();
		$equipement_manager 	= new EquipementModel();
		$user_manager = new UserModel();
		$event_manager 	= new EmpruntModel();
		$user = $user_manager->find($this->getUser()['id']);
		$users       	= $user_manager->findAll();
		$events       	= $event_manager->countAllEvent();
		$emprunt       	= $event_manager->countAllEvent();
		$count_events = $event_manager->countEvents();
		$count_users 	= $user_manager->countUsers();
		$user_list 		= $user_manager->UsersList();
		$count_list 		= $equipement_manager->countNbrEquipement();
		$count_emprunteur 	= $emprunteur_manager->countEmprunteur();
		// Traitement du formulaire pour changer l'email; $_POST['button-email'] vient du name dans l'HTML pour différencier les deux formulaires
		foreach ($users as $user) {

			if (isset($_POST['button-'.$user['id']])) {
				$role = $_POST['role'];
				$id = $user['id'];
				$users = $user_manager->update(['role' => $role], $id);
				$this->redirectToRoute('default_userslist');
			}

		}
		
		$emprunt = $user_manager->findAll();
		$users = $user_manager->findAll();
		$this->show('default/userslist' , ['user' => $user , 'users' => $users, 'count_events' => $count_events, 'count_users' => $count_users, 'user_list' => $user_list,'count_list' => $count_list,'count_emprunteur' => $count_emprunteur]);

	}



	/*
	** Fonction pour la connexion permet depuis la frontpage de se connecter
	*/
	public function login()
	{
			
		if (isset($_POST['button-login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$auth_manager = new \W\Security\AuthentificationModel();

			$user_id = $auth_manager->isValidLoginInfo($username, $password);
			if ($user_id) 
			{ // Si le couple username/password est valid
				$user_manager = new UserModel();
				$user = $user_manager->find($user_id); // Récupére toutes les infos de l'utilisateur qui se connecte
				$auth_manager->logUserIn($user); // La connexion se fait
				if($user['role'] === 'admin'){
				$this->redirectToRoute('default_profile_admin');
				}elseif ($user['role'] === 'user') {
					$this->redirectToRoute('default_profile');
				}
			}else
			{
				echo "<div class='alert-danger'>Votre Email ou Mot de Passe est incorrect</div>";
			}

		}

			$user_manager  = new UserModel();
			$event_manager = new EmpruntModel();
			//$lastevent     = $event_manager->findAllWithAuthor('post', 'DESC', 3);
			/*$kilo    = $event_manager->sumtotalki();*/
			$logo     = $user_manager->getLogoByUser('logo');
			// J'injecte la variable messages dans ma vue
			$this->show('default/frontPage', ['logo'=>$logo]);
		}
}
			
