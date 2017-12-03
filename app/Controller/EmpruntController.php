<?php

namespace Controller;

use \W\Controller\Controller;
use  Model\EmpruntModel;
use  Model\EquipementModel;
use Model\EmprunteurModel;
use  Model\UserModel;
use  Model\SubscribersModel;

class EmpruntController extends Controller
{
    /**
      *  On creer un emprunt
      *
     **/
   public function create()
    {

        $this->allowTo(['admin']);
        
        $id_Emprunteur = null;
        $id_Materiels  = null;
        $DatePrevRetour = null;
        $QuantiteEmprunter = null;
        $id_Etat_1 = null;


        $emprunteur_manager = new EmprunteurModel();
        $equipement_manager = new EquipementModel();
        $event_manager = new EmpruntModel();
        $user_manager = new UserModel();
        $events  = $emprunteur_manager->AllEmprunteur();
        $emprunt        = $emprunteur_manager->AllEmprunteur();
        $listEquip = $equipement_manager->countEquipement();
        $listetat = $equipement_manager->listetat();
        $listMat = $equipement_manager->listMat();
        $EtatEmprunt = $equipement_manager->listMat();




        if(!empty($_POST))
        {
            $id_Emprunteur  = trim($_POST['id_Emprunteur']);
            $id_Materiels  =trim($_POST['id_Materiels']);
            $DatePrevRetour     = date('Y-m-d' , strtotime($_POST['DatePrevRetour']));
            $QuantiteEmprunter     = trim($_POST['QuantiteEmprunter']);
            $id_Etat      = trim($_POST['id_Etat_1']);


          $auth_manager = new \W\Security\AuthentificationModel();
          if(!empty($_POST) ){
             $result = $event_manager->insert([
                'id_Emprunteur'     => $id_Emprunteur,
                'id_Materiels'      => $id_Materiels,
                'DatePrevRetour'    => date('Y-m-d' , strtotime($DatePrevRetour)),
                'QuantiteEmprunter' => $QuantiteEmprunter ,
                'id_Etat_1'         => $id_Etat,
                 'id_Etat'            => '1',
              ], $id_Emprunt = true);

          }
          $this->redirectToRoute('default_profile_admin');
        }
        $this->show('emprunt/create' , ['emprunt' => $emprunt,'id_Materiels'=>$id_Materiels ,'DatePrevRetour'=>$DatePrevRetour, 'QuantiteEmprunter'=>$QuantiteEmprunter , 'id_Etat_1'=>$id_Etat_1,'EtatEmprunt'=>$EtatEmprunt, 'listEquip' => $listEquip,'listetat' => $listetat  ,'listMat' => $listMat]);

    }

    public function createbyUser()
    {

        /**
         *  Emprunt creer par l'utilisateur
         *
         **/
        $this->allowTo(['user']);

        $id_Emprunteur = null;
        $id_Materiels  = null;
        $DatePrevRetour = null;
        $QuantiteEmprunter = null;
        $id_Etat_1 = null;


        $emprunteur_manager = new EmprunteurModel();
        $equipement_manager = new EquipementModel();
        $event_manager = new EmpruntModel();
        $user_manager = new UserModel();
        $events  = $emprunteur_manager->AllEmprunteur();
        $emprunt        = $emprunteur_manager->AllEmprunteur();
        $listEquip = $equipement_manager->countEquipement();
        $listetat = $equipement_manager->listetat();
        $listMat = $equipement_manager->listMat();
        $EtatEmprunt = $equipement_manager->listMat();




        if(!empty($_POST))
        {
            $id_Emprunteur  = trim($_POST['id_Emprunteur']);
            $id_Materiels  =trim($_POST['id_Materiels']);
            $DatePrevRetour     = date('Y-m-d' , strtotime($_POST['DatePrevRetour']));
            $QuantiteEmprunter     = trim($_POST['QuantiteEmprunter']);
            $id_Etat      = trim($_POST['id_Etat_1']);


            $auth_manager = new \W\Security\AuthentificationModel();
            if(!empty($_POST) ){
                $result = $event_manager->insert([
                    'id_Emprunteur'     => $id_Emprunteur,
                    'id_Materiels'      => $id_Materiels,
                    'DatePrevRetour'    => date('Y-m-d' , strtotime($DatePrevRetour)),
                    'QuantiteEmprunter' => $QuantiteEmprunter ,
                    'id_Etat_1'         => $id_Etat,
                    'id_Etat'            => '1',
                ], $id_Emprunt = true);

            }
            $this->redirectToRoute('default_profile');
        }
        $this->show('emprunt/createbyuser' , ['emprunt' => $emprunt,'id_Materiels'=>$id_Materiels ,'DatePrevRetour'=>$DatePrevRetour, 'QuantiteEmprunter'=>$QuantiteEmprunter , 'id_Etat_1'=>$id_Etat_1,'EtatEmprunt'=>$EtatEmprunt, 'listEquip' => $listEquip,'listetat' => $listetat  ,'listMat' => $listMat]);

    }

     /**
     * Edition d'un article
    */

    public function update($id)
    {
      //$this->allow('admin');
        $id_Emprunteur = null;
        $id_Materiels  = null;
        $DatePrevRetour = null;
        $QuantiteEmprunter = null;
        $id_Etat_1 = null;

        $allowed = ['admin'];

      $emprunt_manager = new EmpruntModel();
      $emprunt = $emprunt_manager->find($id); // Je vais chercher un evenement dans la bdd par son id

      $this->allowTo($allowed);

      if(!empty($_POST))
      {

          $id_Emprunteur       = ucfirst(trim($_POST['id_Emprunteur']));
          $id_Materiels = trim($_POST['id_Materiels']);
          $DatePrevRetour        = date('Y-m-d' , strtotime( $_POST['DatePrevRetour'] ));
          $QuantiteEmprunter       = trim($_POST['QuantiteEmprunter']);
          $id_Etat_1       = trim($_POST['id_Etat_1']);

        $auth_manager = new \W\Security\AuthentificationModel();

          $result = $emprunt_manager->update([
                  'id_Emprunteur'          => $id_Emprunteur,
                  'id_Materiels'          => $id_Materiels,
                  'DatePrevRetour'      => date('Y-m-d' , strtotime( $_POST['DatePrevRetour'] )),
                  'QuantiteEmprunter'         => $QuantiteEmprunter,
                  'id_Etat_1'     => $id_Etat_1,
                ], $id);
             $this->redirectToRoute('default_profile_admin');
          }
        $this->show('emprunt/update' , ['emprunt' => $emprunt]);      
    }
           

      /**
      *  Recupère dans la limite d'affichage souhaiter les émprunts
      *
     **/
/*    public function index($page = 1)
    {
        $equipement_manager= new EquipementModel();
        $event_manager= new EmpruntModel();
        $user_manager = new UserModel();
        $user = $user_manager->find($this->getUser()['id']);
        $users        = $user_manager->findAll();
        $emprunt         = $event_manager->findAll();
        $emprunt         = $event_manager->countAllEvent();
        $emprunt        = $event_manager->countAllEvent();
        $count_events   = $event_manager->countEvents();
        $count_users  = $user_manager->countUsers();
        $user_list    = $user_manager->UsersList();
        $listEquip = $event_manager->countEquipement();
        $count_list   = $event_manager->countNbrEquipement();
        $count_emprunteur   = $event_manager->countEmprunteur();
        $emprunt       = $event_manager->findAll();
       
  

        if(isset($w_user)){
            $count_events = $event_manager->countEmpruntForEmprunteur($this->getUser()['id']);
        }
        $count_users  = $user_manager->countUsers();

        $event_by_page = 2;
        $total_events   = count( $event_manager->findAll() );
        $offset        = ( $page - 1 ) * $event_by_page;
        $max_pages    = ceil($total_events / $event_by_page);

        $emprunt  = $event_manager->AllEmprunteur();
        $emprunt = $event_manager->eventsPagination('' , 'ASC' , $event_by_page , $offset);
      if(isset($count_events)) {
        $this->show('emprunt/index' , [
            'emprunt'       => $emprunt,
            'count_events' => $count_events,
            'count_users'  => $count_users,
            'page'         => $page,
            'event_by_page'=> $event_by_page,
            'offset'       => $offset,
            'max_pages'    => $max_pages,
            'user_list' => $user_list,
            'count_list' => $count_list,
            'count_emprunteur' => $count_emprunteur ,
            ]);
        }
    }*/
}
