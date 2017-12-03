<?php
/**
 * Created by PhpStorm.
 * User: Mustapha
 * Date: 28/11/2017
 * Time: 21:12
 */

namespace Model;
use \W\Model\Model;

class EmprunteurModel extends Model
{



    public function listemprunteur()
    {
        $query = $this->dbh->query('SELECT * FROM `emprunteur`,ecole, promotion WHERE emprunteur.id = promotion.id AND promotion.Id_Ecole = ecole.Id_Ecole');
        return $query->fetchAll();
    }

    public function listeEcole()
    {
        $query = $this->dbh->query('SELECT * FROM ecole LEFT JOIN promotion ON ecole.Id_Ecole = promotion.Id_Ecole');
        return $query->fetchAll();
    }

    public function countEmprunteur()
    {
        $query = $this->dbh->query('SELECT COUNT(*) as emprunteur FROM `emprunteur`');
        return $query->fetch();
    }

    public function AllEmprunteur()
    {
        $query = $this->dbh->query('SELECT * FROM emprunteur INNER JOIN promotion ON emprunteur.id = promotion.id');
        return $query->fetchAll();
    }
}