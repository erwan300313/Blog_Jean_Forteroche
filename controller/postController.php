<?php
require_once('controller.php');

Class PostController{

    private $postManager;

    public function __construct(){
        $this->postManager = new PostManager();

    }

    public function posts()
    {
        $getPosts = $this->postManager->getPosts();
        $view = new ViewManager('blog');
        $view->generate(array('getPosts' => $getPosts));
    }

    public function post($id)
    {
        $getPost = $this->postManager->getPost($id);
        $view = new ViewManager('post');
        $view->generate(array('getPost' => $getPost));
    }

}