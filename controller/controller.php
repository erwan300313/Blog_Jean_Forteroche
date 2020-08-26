<?php

// Chargement des classes
require_once('model/postManager.php');
require_once('model/userManager.php');
require_once('model/variousManager.php');

function indexPosts()
{
    $postManager = new PostManager(); // Création de l'objet
    $userManager = new UserManager();
    $variousManager = new VariousManager();
    $bio = $variousManager->getBio(); // Appel de la fonction getBio
    $syn = $variousManager->getSyn(); // Appel de la fonction getSyn
    $lastPost = $postManager->lastPost();
    $indexPost = $postManager->indexPost();
    $lastUser = $userManager->getLastUser();
    require('view/indexView.php');
}