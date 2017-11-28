<?php

namespace Model;

use \W\Model\Model;
use  Model\EquipementModel;

class EquipementModel extends Model
{

  protected $primaryKey = 'id_Materiels';

  protected $table = 'materiels';
  

    public function setPrimaryKey($primaryKey)
    {
      $this->primaryKey = $primaryKey;
      return $this;
    }
       public function listetat()
    {
      $query = $this->dbh->query('SELECT * FROM `etat`');
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



} //class EventsModel

