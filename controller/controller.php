<?php

// Chargement des classes
require_once('model/postManager.php');
require_once('model/userManager.php');
require_once('model/variousManager.php');

function indexPosts()
{
    require('rightBlockController.php');
    $variousManager = new VariousManager();
    $bio = $variousManager->getExtractBio(); // Appel de la fonction getBio
    $syn = $variousManager->getExtractSyn(); // Appel de la fonction getSyn
    $indexPost = $postManager->indexPost();
    require('view/indexView.php');
}

function various($id)
{
    require('rightBlockController.php');
    $variousManager = new VariousManager();
    $getVarious = $variousManager->getVarious($id);
    require('view/variousView.php');
}

function about()
{
    require('rightBlockController.php');
    $variousManager = new VariousManager();
    $getFullVarious = $variousManager->getFullVarious();
    require('view/aboutView.php');
}

function posts()
{
    require('rightBlockController.php');
    $getPosts = $postManager->getPosts();
    require('view/blogView.php');
}

function post($id)
{
    require('rightBlockController.php');
    $getPost = $postManager->getPost($id);
    require('view/postView.php');
}