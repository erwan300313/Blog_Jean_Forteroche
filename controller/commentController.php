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
        $this->reportManager = new ReportManager();

    }

    public function getComment($id){

        require('rightBlockController.php');
        $getExtractPost = $this->postManager->getExtractpost($id);
        $getComments = $this->commentManager->getComments($id);
        require('view/commentsView.php');
    }

    public function addComment($post_id, $author, $comment){
        $this->commentManager->addComment($post_id, $author, $comment);
        header('Location: index.php?action=comments&id=' . $post_id);
    }

    public function reportComment($comment_id, $reportReason, $report_author){
        $this->reportManager->reportComment($comment_id, $reportReason, $report_author);
        header('Location: index.php?action=comments&id=' . $_GET['post_id']);
    }

    public function editComment($comment_id, $comment){
        $this->commentManager->editComment($comment_id, $comment);
        header('Location: index.php?action=comments&id=' . $_GET['post_id']);
    }

    public function deleteComment($commentId){
        $this->commentManager->deleteComment($commentId);
        header('Location: index.php?action=comments&id=' . $_GET['id']);
   }

}