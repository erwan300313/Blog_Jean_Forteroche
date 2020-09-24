<?php

require_once("model/manager.php");


class VariousManager extends Manager
{
    /* public function getExtractBio()//small extract for home page
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 296 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = 1');
        $bio = $req->fetch();
        return $bio;
    } */

    public function getExtractBio(){
        $sql = 'SELECT id,author, title, LEFT( content, 296 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = "1" ';
        $bio = $this->executerRequete($sql);
        return $bio->fetch();;
    }

    /* public function getExtractSyn()//small extract for home page
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = 2');
        $syn = $req->fetch();
        return $syn;
    } */

    public function getExtractSyn(){
        $sql = 'SELECT id,author, title, LEFT( content, 300 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = "2" ';
        $syn = $this->executerRequete($sql);
        return $syn->fetch();;
    }

    /* public function getVarious($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = ?');
        $req->execute(array($id));
        $various = $req->fetch();
        return $various;
    } */

    public function getvarious($id) {
        $sql = 'SELECT id,author, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various WHERE id = ?';
        $Various = $this->executerRequete($sql, array($id));
        return $Various->fetch(); 
    }

    /* public function getFullVarious()//medium extract for about page
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various');
        return $req;
    } */

    public function getFullVarious(){
        $sql = 'SELECT id,author, title, LEFT( content, 600 ) AS content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM various';
        $FullVarious = $this->executerRequete($sql);
        return $FullVarious;
    }


}