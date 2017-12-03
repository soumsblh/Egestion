<?php

namespace Model;

use \W\Model\Model;

class EmpruntModel extends Model
{

  protected $primaryKey = 'id_Emprunt';
  

    public function countEvents()
    {
      $query = $this->dbh->query('SELECT COUNT(*) as emprunt  FROM emprunt ');
      return $query->fetch();
    }
       public function countEmpruntForEmprunteur($id)
    {
      $query = $this->dbh->query('SELECT COUNT(*) as emprunts FROM emprunt Where emprunt.id_Emprunt=' . $id);
      return $query->fetch();
    }
  public function countAllEvent(){
    $query = $this->dbh->query('SELECT * FROM `emprunt`, `emprunteur`, `materiels`,`etat`,`promotion`, `type`,ecole,marque WHERE emprunt.id_Emprunteur=emprunteur.id_Emprunteur AND emprunt.id_Materiels=materiels.id_Materiels AND etat.id_Etat=materiels.id_Etat AND emprunteur.id=promotion.id AND materiels.id_type=type.id_type AND promotion.Id_Ecole = ecole.Id_Ecole AND materiels.id_marque = marque.id_marque GROUP BY id_emprunt ORDER BY `emprunt`.`DateEmprunt` DESC');
    return $query->fetchAll();
  }
      public function eventsPagination($orderBy = '', $orderDir = 'DESC', $limit = null, $offset = null)
    {

     // SELECT * FROM `users` INNER JOIN events ON users.id = events.user_id ORDER BY `post` DESC LIMIT 10 OFFSET 0
      $sql = 'SELECT *, emprunteur.id_Emprunteur as id_Emprunteurs, emprunt.id_emprunt as id_emprunts FROM etat,promotion,ecole,materiels,marque,type,'. $this->table;
      if (!empty($orderBy)){

        //sécurisation des paramètres, pour éviter les injections SQL
        if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
          die('Error: invalid orderBy param');
        }
        $orderDir = strtoupper($orderDir);
        if($orderDir != 'ASC' && $orderDir != 'DESC'){
          die('Error: invalid orderDir param');
        }
        if ($limit && !is_int($limit)){
          die('Error: invalid limit param');
        }
        if ($offset && !is_int($offset)){
          die('Error: invalid offset param');
        }

        $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
      }
      $sql .= ' LEFT JOIN emprunteur ON emprunteur.id_Emprunteur = emprunt.id_Emprunteur'; // ne pas oublier lespace avant le LEFT JOIN
          if($limit){
              $sql .= ' LIMIT '.$limit;
              if($offset){
                  $sql .= ' OFFSET '.$offset;
              }
          }
      $sth = $this->dbh->prepare($sql);
      $sth->execute();

      return $sth->fetchAll();
    }
  
} //class EventsModel

