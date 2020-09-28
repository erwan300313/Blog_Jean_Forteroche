<?php

require_once("model/manager.php");


class VariousManager extends Manager
{
    public function getExtractBio(){
        $sql = 'SELECT id,author, title, LEFT( content, 296 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = "1" ';
        $bio = $this->executerRequete($sql);
        return $bio->fetch();;
    }

    public function getExtractSyn(){
        $sql = 'SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = "2" ';
        $syn = $this->executerRequete($sql);
        return $syn->fetch();;
    }

    public function getvarious($id) {
        $sql = 'SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = ?';
        $Various = $this->executerRequete($sql, array($id));
        return $Various->fetch(); 
    }

    public function getFullVarious(){
        $sql = 'SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various';
        $FullVarious = $this->executerRequete($sql);
        return $FullVarious;
    }
}