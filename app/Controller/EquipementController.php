<?php
namespace Controller;

use \W\Controller\Controller;
use  Model\EquipementModel;
use  Model\EmpruntModel;
use  Model\UserModel;
use  Model\SubscribersModel;

class EquipementController extends Controller
{

     /**
      * Page pour afficher tous les materiaux
      */
      public function equipement()
      {

        //redirection a une page d'erreur si on on n'est pas admin
        $this->allowTo('admin');

        $equipement_manager = new EquipementModel();  
        $user_manager = new UserModel();
        $event_manager  = new EmpruntModel();
        $user = $user_manager->find($this->getUser()['id']);
        $users        = $user_manager->findAll();
        $events         = $event_manager->findAll();
        $events         = $event_manager->countAllEvent();
        $emprunt        = $event_manager->countAllEvent();
        $count_events   = $event_manager->countEvents();
        $count_users  = $user_manager->countUsers();
        $user_list    = $user_manager->UsersList();
        $listEquip = $equipement_manager->countEquipement();
        $count_list   = $equipement_manager->countNbrEquipement();
        $count_emprunteur   = $event_manager->countEmprunteur();


        $this->show('equipement/equipement' , [ 'user' => $user , 'users' => $users, 'count_events' => $count_events, 'count_users' => $count_users,'user_list' => $user_list, 'count_list' => $count_list,'listEquip' => $listEquip,'count_emprunteur' => $count_emprunteur]);
        
      }
        /**
          *  On creer un Matériel
          *
         **/
       public function Newequipement()
        {

            $this->allowTo(['admin']);

            $id_type  = null;
            $id_marque   = null;
            $ModelMateriel  = null;
            $QuantiteMateriels = null;
            $id_Etat = null;

            $equipement_manager = new EquipementModel();
            $listtype = $equipement_manager->listtype();
            $listMarque = $equipement_manager->listMarque();

            if(!empty($_POST))
            {
                $id_type  = trim($_POST['id_type']);
                $id_marque   = trim($_POST['id_marque']);
                $QuantiteMateriels     = $_POST['QuantiteMateriels'];
                $ModelMateriel     = trim($_POST['ModelMateriel']);
                $id_Etat      = trim($_POST['id_Etat']);

              $auth_manager = new \W\Security\AuthentificationModel();

                 $result = $equipement_manager->insert([
                     'QuantiteMateriels'  => $QuantiteMateriels ,
                     'ModelMateriel'     => $ModelMateriel ,
                     'id_type'           => $id_type,
                     'id_Etat'            => '1',
                     'id_marque'         => $id_marque,
                  ], $id_Materiels = true);




                $this->redirectToRoute('default_profile_admin');
            }
            $this->show('equipement/Newequipement' , [
                'listMarque' =>$listMarque,
                'listtype' => $listtype,
                'id_type'=>$id_type ,
                'id_marque' => $id_marque,
                'QuantiteMateriels'=>$QuantiteMateriels ,
                'ModelMateriel' => $ModelMateriel ,
                'id_Etat'=>$id_Etat]);
        }
  }// Classe Equipement