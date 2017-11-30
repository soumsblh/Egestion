<?php
/**
 * Created by PhpStorm.
 * User: Mustapha
 * Date: 28/11/2017
 * Time: 21:13
 */

namespace Controller;

use \W\Controller\Controller;
use  Model\EmpruntModel;
use  Model\EquipementModel;
use  Model\EmprunteurModel;
use  Model\UserModel;
use  Model\SubscribersModel;

class EmprunteurController extends Controller
{
    /**
     * Page pour afficher tous les emprunteurs
     */
    public function emprunteur()
    {

        //redirection a une page d'erreur si on on n'est pas admin
        $this->allowTo('admin');

        $emprunteur_manager = new EmprunteurModel();
        $equipement_manager = new EquipementModel();
        $user_manager = new UserModel();
        $event_manager  = new EmpruntModel();
        $user = $user_manager->find($this->getUser()['id']);
        $users        = $user_manager->findAll();
        $emprunt        = $event_manager->findAll();
        $emprunt        = $event_manager->countAllEvent();
        $count_events   = $event_manager->countEvents();
        $count_users  = $user_manager->countUsers();
        $user_list    = $user_manager->UsersList();
        $listEquip    = $equipement_manager->countEquipement();
        $count_list   = $equipement_manager->countNbrEquipement();
        $count_emprunteur   = $emprunteur_manager->countEmprunteur();
        $list_emprunteur  = $emprunteur_manager->listemprunteur();

        $this->show('emprunteur/emprunteur' , [
            'emprunt' => $emprunt ,
            'user' => $user ,
            'users' => $users,
            'count_events' => $count_events,
            'count_users' => $count_users,
            'user_list' => $user_list,
            'count_list' => $count_list,
            'listEquip' => $listEquip,
            'count_emprunteur' => $count_emprunteur ,
            'list_emprunteur' => $list_emprunteur
        ]);

    }

    /**
     *  On creer un emprunt
     *
     **/
    public function NewEmprunteur()
    {

        $this->allowTo(['admin','user']);

        $Nom = null;
        $Prenom  = null;
        $id_Promo = null;

        $emprunteur_manager = new EmprunteurModel();
        $listEmprunteur  = $emprunteur_manager->AllEmprunteur();
        $InfoEmprunteur  = $emprunteur_manager->listeEcole();

        if(!empty($_POST))
        {
            $Nom  = trim($_POST['Nom']);
            $Prenom  =trim($_POST['Prenom']);
            $id_Promo      = trim($_POST['id']);


            $auth_manager = new \W\Security\AuthentificationModel();

            $result = $emprunteur_manager->insert([
                'Nom'     => $Nom,
                'Prenom'      => $Prenom,
                'id'            => $id_Promo,
            ], $id_Emprunteur = true);

            if($user['role'] === 'admin'){
                $this->redirectToRoute('default_profile_admin');
            }elseif ($user['role'] === 'user') {
                $this->redirectToRoute('default_profile');
            }
        }
        $this->show('emprunteur/NewEmprunteur' , ['InfoEmprunteur' => $InfoEmprunteur,'listEmprunteur' => $listEmprunteur,'Nom'=>$Nom ,'Prenom'=>$Prenom,'id_Promo' => $id_Promo]);
    }
    
}