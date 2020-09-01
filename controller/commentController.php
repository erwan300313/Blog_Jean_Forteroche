<?php
require_once('controller.php');

Class CommentController{

    private $postManager;
    private $userManager;
    private $variousManager;
    private $commentManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->userManager = new UserManager();
        $this->variousManager = new VariousManager();
        $this->commentManager = new CommentManager();
    }

    public function getComment($id){

        require('rightBlockController.php');
        $getExtractPost = $this->postManager->getExtractpost($id);
        $getComments = $this->commentManager->getComments($id);
        require('view/commentsView.php');
    }
}