<?php

namespace Controller;

use \W\Controller\Controller;
use  Model\EmpruntModel;
use  Model\EquipementModel;
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

        $this->allowTo(['admin' , 'user']);
        
        $id_Emprunteur = null;
        $id_Materiels  = null;
        $DatePrevRetour = null;
        $QuantiteEmprunter = null;
        $id_Etat_1 = null;
        


        $equipement_manager = new EquipementModel();      
        $event_manager = new EmpruntModel();      
        $event_manager = new EmpruntModel();
        $events  = $event_manager->AllEmprunteur();
        $emprunt        = $event_manager->AllEmprunteur();
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
            $id_Etat_1      = trim($_POST['id_Etat_1']);
            $id_Etat      = trim($_POST['id_Etat_1']);


   
          $auth_manager = new \W\Security\AuthentificationModel();

             $result = $event_manager->insert([
                'id_Emprunteur'     => $id_Emprunteur,
                'id_Materiels'      => $id_Materiels,
                'DatePrevRetour'    => date('Y-m-d' , strtotime($DatePrevRetour)),     
                'QuantiteEmprunter' => $QuantiteEmprunter ,
                'id_Etat'         => '1',
                'id_Etat_1'         => $id_Etat_1,
              ], $event_manager = true);

          /*  foreach ($listEquip as $equip) 
            {
                if (isset($_POST['QuantiteEmprunter']))
                {
                    $QuantiteMateriels = $equip['QuantiteMateriels'];
                    $id_Materiels = $equip['id_Materiels']; 
                    $reste = $QuantiteMateriels - $QuantiteEmprunter;
                    debug($reste);
                   $listEquip = $event_manager->insert(['QuantiteMateriels' => $reste], $listEquip =true);
                    
                 }
            }*/
           $this->redirectToRoute('default_profile_admin');
        }          
        $this->show('emprunt/create' , ['emprunt' => $emprunt,'id_Materiels'=>$id_Materiels ,'DatePrevRetour'=>$DatePrevRetour, 'QuantiteEmprunter'=>$QuantiteEmprunter , 'id_Etat_1'=>$id_Etat_1,'EtatEmprunt'=>$EtatEmprunt, 'listEquip' => $listEquip,'listetat' => $listetat  ,'listMat' => $listMat]);
        }
           

  /**
  * Page pour afficher tous les emprunteurs
  */
  public function emprunteur()
  {

    //redirection a une page d'erreur si on on n'est pas admin
    $this->allowTo('admin');

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
    $count_emprunteur   = $event_manager->countEmprunteur();
    $list_emprunteur  = $event_manager->listemprunteur();

    $this->show('emprunt/emprunteur' , [
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
