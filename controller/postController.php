<?php
require_once('controller.php');

Class PostController{

    private $postManager;
    private $userManager;
    private $variousManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->userManager = new UserManager();
        $this->variousManager = new VariousManager();
    }

    public function posts()
    {
        require('rightBlockController.php');
        $getPosts = $this->postManager->getPosts();
        require('view/blogView.php');
    }

    public function post($id)
    {
        require('rightBlockController.php');
        $getPost = $this->postManager->getPost($id);
        require('view/postView.php');
    }

}