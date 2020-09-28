<?php
require_once('controller.php');
require_once('view/view.php');

Class IndexController{

    private $postManager;
    private $variousManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->variousManager = new VariousManager();
    }

    //Index data display
    public function home(){

        $indexPost = $this->postManager->indexPost();
        $bio = $this->variousManager->getExtractBio(); 
        $syn = $this->variousManager->getExtractSyn();
        $view = new ViewManager('index');
        $view->generate(array('indexPost' => $indexPost, 'bio' => $bio, 'syn' => $syn));
    }
}