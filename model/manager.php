<?php

abstract class Manager {

    private $db;

    protected function executerRequete($sql, $params = null) {
    if ($params == null) {
        $resultat = $this->getDb()->query($sql);
    }
    else {
        $resultat = $this->getDb()->prepare($sql);
        $resultat->execute($params);
    }
    return $resultat;
    }

    private function getDb() {
    if ($this->db == null) {
        $this->db = new PDO('mysql:host=localhost;dbname=blog_jf;charset=utf8',
        'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->db;
    }
}