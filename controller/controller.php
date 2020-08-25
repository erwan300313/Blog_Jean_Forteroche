<?php

// Chargement des classes
require_once('model/postManager.php');
require_once('model/userManager.php');

function indexPosts()
{
    $postManager = new PostManager(); // Création de l'objet
    $userManager = new UserManager();
    $bio = $postManager->getBio(); // Appel de la fonction getBio
    $syn = $postManager->getSyn(); // Appel de la fonction getSyn
    $lastUser = $userManager->getLastUser();
    require('view/indexView.php');
}