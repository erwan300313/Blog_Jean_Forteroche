<?php

// Chargement des classes
require_once('model/postManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création de l'objet
    $posts = $postManager->getPosts(); // Appel de la fonction getPosts
    require('view/indexView.php');
}