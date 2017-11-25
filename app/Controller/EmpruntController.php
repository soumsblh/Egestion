<?php

namespace Controller;

use \W\Controller\Controller;
use  Model\EmpruntModel;
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

        $id_Materiels  = null;
        $DatePrevRetour = null;
        $QuantiteEmprunter = null;
        $id_Etat_1 = null;
        $id_Emprunteur = null;

          $event_manager = new EmpruntModel();
          $events  = $event_manager->AllEmprunteur();
          $emprunt        = $event_manager->AllEmprunteur();
          $listEquip = $event_manager->countEquipement();
          $listetat = $event_manager->listetat();
          $listMat = $event_manager->listMat();
          $EtatEmprunt = $event_manager->listMat();

        if(!empty($_POST))
        {
            $id_Emprunteur  =$_POST['id_Emprunteur'];
            $id_Materiels  =trim($_POST['id_Materiels']);
            $DatePrevRetour     = date('Y-m-d' , strtotime($_POST['DatePrevRetour']));
            $QuantiteEmprunter     = trim($_POST['QuantiteEmprunter']);
            $id_Etat_1      = trim($_POST['id_Etat_1']);

             $result = $event_manager->insert([
                'id_Emprunteur'         => $id_Emprunteur,
                'id_Materiels'      => $id_Materiels,
                'DatePrevRetour'            => date('Y-m-d' , strtotime($DatePrevRetour)),     
                'QuantiteEmprunter'       => $QuantiteEmprunter ,
                'id_Etat_1'       => $id_Etat_1,
              ], $event_manager = true);  debug($event_manager);
        }          
        $this->show('emprunt/create' , ['emprunt' => $emprunt,'id_Materiels'=>$id_Materiels ,'DatePrevRetour'=>$DatePrevRetour, 'QuantiteEmprunter'=>$QuantiteEmprunter , 'id_Etat_1'=>$id_Etat_1 ,'EtatEmprunt'=>$EtatEmprunt, 'listEquip' => $listEquip,'listetat' => $listetat  ,'listMat' => $listMat]);
        }

    /**
      *  Recupère tous les évènements
      *
     **/
   public function index($page = 1)
    {
        $event_manager= new EmpruntModel();
        $user_manager = new UserModel();
       /* $events       = $event_manager->findAll();*/

        if(isset($w_user)){
            $count_events = $event_manager->countEventsForUser($this->getUser()['id']);
        }
        $count_users  = $user_manager->countUsers();
        
        $event_by_page = 4;
        $total_events   = count( $event_manager->findAll() );
        $offset        = ( $page - 1 ) * $event_by_page;
        $max_pages    = ceil($total_events / $event_by_page);

        $events = $event_manager->eventsPagination('' , 'DESC' , $event_by_page , $offset);

      if(isset($count_events)) {
        $this->show('event/index' , [
            'emprunt'       => $events,
            'count_events' => $count_events,
            'count_users'  => $count_users,
            'page'         => $page,
            'event_by_page'=> $event_by_page,
            'offset'       => $offset,
            'max_pages'    => $max_pages
            ]);
        }
        else {
             $this->show('event/index' , [
                 'emprunt'      => $events,
                 'count_users' => $count_users,
                 'page'         =>$page,
                 'event_by_page'=>$event_by_page,
                 'offset'       =>$offset,
                 'max_pages'   => $max_pages
                 ]);
        }
    }
    /**
      *  Recupère un seul évènement
      *
     **/
    public function view($id)
    {

    $event_manager  = new EmpruntModel();
    $user_manager   = new UserModel();
    $emprunt = $event_manager->find($id);

    $this->show('emprunt/view' , ['emprunt' => $emprunt]);

  }

    /**
     * Edition d'un article
    */

  public function update($id)
    {
      //$this->allow('admin');
      $title           = null;
      $description     = null;
      $date            = null;
      $image           = null;
      $message         = '';
      $depart          = null;
      $depart_lat      = null;
      $depart_long     = null;
      $arrivee         = null;
      $arrivee_lat     = null;
      $arrivee_long    = null;
      $arrivee_address = null;
      $depart_address  = null;
      $hour            = null ;

      $allowed = ['admin'];

      $event_manager = new EventsModel();

      $event = $event_manager->find($id); // Je vais chercher un evenement dans la bdd par son id
      if ( $this->getUser()['role'] === 'user' && $this->getUser()['id'] == $event['user_id'] ) { // Si le role est user et que l'event appartient à cet user

        $allowed[] = 'user';
      }

      $this->allowTo($allowed);

      if(!empty($_POST))
      {

          $title       = ucfirst(trim($_POST['title']));
          $description = trim($_POST['event']);
          $image       = trim($_POST['image']);
          $date        = date('Y-m-d' , strtotime( $_POST['date'] ));
          $hour        = date('H:i:s' , strtotime( $_POST['hour'] ));
          $depart      = ucfirst(trim($_POST['depart']));
          $arrivee     = ucfirst(trim($_POST['arrivee']));

          if (!empty($_POST['depart']) && !empty($_POST['arrivee'])) {
            $coords = $this->setTrajet($depart, $arrivee);
          }


           $errors=[];

           if( strlen( $title ) < 3 || empty($title) )
           {
               $errors['title'] = "Le titre doit comporter 3 caractères minimum.";
           }

           if( strlen( $description ) < 15 || empty($description))
           {
               $errors['event'] = "Votre paragraphes doit comporte 15 lignes minimum.";
           }

           if(!filter_var($image, FILTER_VALIDATE_URL) === true )
           {
               $errors['image'] = "Votre url doit etre valide";
           }

           if(  empty( $date ) )
           {
               $errors['date']= "Votre date doit etre au format Année/Mois/Jours .";
           }

           if( strlen( $depart ) <= 3 || empty($depart) )
           {
               $errors['depart'] = "L'addresse de départ doit comporter 3 caractères minimum.";
           }

           if( strlen( $arrivee ) <= 3 || empty($arrivee) )
           {
             $errors['arrivee'] = "L'addresse d'arrivée doit comporter 3 caractères minimum.";
           }

           if( empty($errors) )
           {
               $auth_manager = new \W\Security\AuthentificationModel();

          $result = $event_manager->update([
                  'title'          => $title,
                  'event'          => $description,
                  'image'          => $image,
                  'date_time'      => date('Y-m-d' , strtotime( $_POST['date'] )),
                  'hour'           => date('H:i:s' , strtotime( $_POST['hour'] )),
                  'depart'         => $depart,
                  'depart_lat'     => $coords['depart']['depart_lat'],
                  'depart_long'    => $coords['depart']['depart_long'],
                  'depart_address' => $coords['depart']['depart_address'],
                  'arrivee'        => $arrivee,
                  'arrivee_lat'    => $coords['arrivee']['arrivee_lat'],
                  'arrivee_long'   => $coords['arrivee']['arrivee_long'],
                  'arrivee_address'=> $coords['arrivee']['arrivee_address']

                ], $id);

                // Si le role est user et que l'event appartient à cet user / &&  $this->getUser()['id'] == $w_user['role']
                if ( $this->getUser()['role'] === 'user' && $this->getUser()['id'] == $event['user_id'] ) {
                  $this->redirectToRoute('default_profile');
                }

                elseif ($this->getUser()['role'] === 'admin') {
                $this->redirectToRoute('default_profile_admin');
                }
                // //si cest un admin et quil est sur profil on le renvoi a profil
                // if (isset($_GET['redirect']) && $_GET['redirect'] == 'default_profile_admin') {
                //   $this->redirectToRoute('default_profile_admin');
                // }
          }
          else {

               $message = $errors ;
          }
      }
      $this->show('event/update' , ['message' => $message  , 'title'=> $title , 'event' => $event ]);
    }

    //on recupere l'id de l'article avec l'url pour le supprimer
  public function delete($id)
  {
    $event_manager = new EventsModel();
    $event_manager->delete($id); // ici on supprime l'article de la bdd

    //si c'est un bien un user
    if ( $this->getUser()['role'] === 'user' && $this->getUser()['id'] == $event['user_id'] ) { // Si le role est user et que l'event appartient à cet user / &&  $this->getUser()['id'] == $w_user['role']
        $this->redirectToRoute('profil_index');
    }

    //si cest un admin et qui est sur profil on le renvoi a profil
    if (isset($_GET['redirect']) && $_GET['redirect'] == 'profil_index') {
        $this->redirectToRoute('profil_index');
    }


    $this->redirectToRoute('event_index');
  }
}
