<?php
require_once('controller.php');

Class CommentController{

    private $postManager;
    private $commentManager;
    private $reportManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->reportManager = new ReportManager();
    }

    public function getComments($id){
        $getExtractPost = $this->postManager->getExtractpost($id);
        $getComments = $this->commentManager->getComments($id);
        $view = new ViewManager('comments');
        $view->generate(array('getExtractPost' => $getExtractPost, 'getComments' => $getComments));
    }

    public function getComment($comment_id){
        if($_SESSION['pseudo'] == $_GET['author']){
            $getExtractPost = $this->postManager->getExtractpost($_GET['post_id']);
            $getComment = $this->commentManager->getComment($comment_id);
            $view = new ViewManager('editComment');
            $view->generate(array('getExtractPost' => $getExtractPost, 'getComment' => $getComment));
        }else{
            throw new Exception('Vous devez être l\'auteur du commentaire pour le modifier.');
        }
        
    }


}