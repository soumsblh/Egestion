<?php

namespace Model;

use \W\Model\Model;
use  Model\EmpruntModel;

class EmpruntModel extends Model
{

  protected $primaryKey = 'id_Emprunt';
  

    public function setPrimaryKey($primaryKey)
    {
      $this->primaryKey = $primaryKey;
      return $this;
    }
    public function countEvents()
    {
      $query = $this->dbh->query('SELECT COUNT(*) as emprunt  FROM emprunt ');
      return $query->fetch();
    }
       public function listetat()
    {
      $query = $this->dbh->query('SELECT * FROM `etat`');
      return $query->fetchAll();
    }
           public function listemprunteur()
    {
      $query = $this->dbh->query('SELECT * FROM `emprunteur`,ecole, promotion WHERE id_Emprunteur = promotion.id AND ecole.Id_Ecole = promotion.Id_Ecole');
      return $query->fetchAll();
    }
           public function listMat()
    {
      $query = $this->dbh->query('SELECT DISTINCT * FROM `type`,marque,materiels WHERE type.id_type=marque.id_marque AND materiels.id_Materiels= type.id_type');
      return $query->fetchAll();
    }

    public function countEquipement()
    {
      $query = $this->dbh->query('SELECT * FROM `materiels`, type,etat,marque WHERE materiels.id_Materiels = type.id_type AND materiels.id_Materiels = etat.id_Etat AND materiels.id_Materiels =marque.id_marque');
      return $query->fetchAll();
    }
    public function countNbrEquipement()
    {
      $query = $this->dbh->query('SELECT COUNT(*) as list FROM `materiels`, marque, type,etat WHERE materiels.id_Materiels = type.id_type AND etat.id_Etat= materiels.id_Materiels AND  marque.id_marque= materiels.id_Materiels');
      return $query->fetch();
    }
      public function countUsers()
    {
      $query = $this->dbh->query('SELECT COUNT(*) as users FROM users');
      return $query->fetch();
    }
       public function countEmprunteur()
    {
      $query = $this->dbh->query('SELECT COUNT(*) as emprunteur FROM `emprunteur`');
      return $query->fetch();
    }
      public function UsersList()
  {
    $query = $this->dbh->query('SELECT id,firstname,lastname,role,email,NomEcole FROM users,ecole WHERE users.Id_Ecole = ecole.Id_Ecole');
    return $query->fetchAll();
  }
     public function AllEmprunteur()
  {
    $query = $this->dbh->query('SELECT * FROM `emprunteur`');
    return $query->fetchAll();
  }
  public function countAllEvent(){
    $query = $this->dbh->query('SELECT * FROM `emprunt`, `emprunteur`, `materiels`,`etat`,`promotion`, `type`,ecole WHERE emprunt.id_Emprunteur=emprunteur.id_Emprunteur AND emprunt.id_Materiels=materiels.id_Materiels AND etat.id_Etat=materiels.id_Etat AND emprunt.id_Emprunteur=promotion.id AND materiels.id_Materiels=type.id_type AND promotion.Id_Ecole = ecole.Id_Ecole GROUP BY id_emprunt ORDER BY `emprunt`.`DateRetour` ASC');
    return $query->fetchAll();
  }
  
} //class EventsModel
