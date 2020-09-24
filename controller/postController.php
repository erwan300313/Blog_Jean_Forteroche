<?php
require_once('controller.php');

Class PostController{

    private $postManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

    }

    public function getPosts()
    {
        $getPosts = $this->postManager->getPosts();

        if($_GET['action'] == 'blog'){
            $view = new ViewManager('blog');
            $view->generate(array('getPosts' => $getPosts));
        }
        elseif($_GET['action'] == 'postsMode' OR 'addPost' OR 'editPost' OR 'deletePost'){
            $view = new ViewManager('postMode');
            $view->generate(array('getPosts' => $getPosts));
        }
        
    }
    
    public function getPost($id)
    {
        $getPost = $this->postManager->getPost($id);
        if(!$getPost){
            throw new Exception('Le billet demander n\'existe pas .');
        }
        if($_GET['action'] == 'post'){
            $view = new ViewManager('post');
            $view->generate(array('getPost' => $getPost));
        }elseif($_GET['action'] == 'editPostView'){
            $view = new ViewManager('editPost');
            $view->generate(array('getPost' => $getPost));
        }
    }

    public function addPost($author, $title, $content){
        $addPost = $this->postManager->addPost($author, $title, $content);
        $this->getPosts();
    }

    public function editPost($post_id, $content, $title){
        $this->postManager->editPost($post_id, $content, $title);
        $this->getPosts();
    }
    
    public function deletePost($post_id){
        $this->postManager->deletePost($post_id);
        $this->commentManager->deletePostComment($post_id);        
        $this->getPosts();
    }

}