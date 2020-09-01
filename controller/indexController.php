<?php
require_once('controller.php');


Class IndexController{

    private $postManager;
    private $userManager;
    private $variousManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->userManager = new UserManager();
        $this->variousManager = new VariousManager();
    }

    public function home(){

        require('rightBlockController.php');
        $indexPost = $this->postManager->indexPost();
        $bio = $this->variousManager->getExtractBio(); 
        $syn = $this->variousManager->getExtractSyn();
        
        require('view/indexView.php');
    }

    public function various($id){
        require('rightBlockController.php');
        $getVarious = $this->variousManager->getVarious($id);
        require('view/variousView.php');
    }

}