<?php
require_once('controller.php');

Class PostController{

    private $postManager;

    public function __construct(){
        $this->postManager = new PostManager();

    }

    public function getPosts()
    {
        $getPosts = $this->postManager->getPosts();
        $view = new ViewManager('blog');
        $view->generate(array('getPosts' => $getPosts));
    }

    public function getPost($id)
    {
        $getPost = $this->postManager->getPost($id);
        $view = new ViewManager('post');
        $view->generate(array('getPost' => $getPost));
    }

    public function addPost($author, $title, $content){
        $addPost = $this->postManager->addPost($author, $title, $content);
        $this->getPost($addPost);
    }

}