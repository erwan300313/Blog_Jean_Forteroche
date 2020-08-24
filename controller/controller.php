<?php

// Chargement des classes
require_once('model/postManager.php');

function indexPosts()
{
    $postManager = new PostManager(); // Création de l'objet
    $bio = $postManager->getBio(); // Appel de la fonction getBio
    $syn = $postManager->getSyn(); // Appel de la fonction getSyn
    require('view/indexView.php');
}