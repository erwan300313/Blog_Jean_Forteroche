<?php
require_once('controller.php');

Class AboutController{

    private $postManager;
    private $userManager;
    private $variousManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->userManager = new UserManager();
        $this->variousManager = new VariousManager();
    }

    function various($id)
    {
        require('rightBlockController.php');
        $getVarious = $this->variousManager->getVarious($id);
        require('view/variousView.php');
    }

    function about()
    {
        require('rightBlockController.php');
        $getFullVarious = $this->variousManager->getFullVarious();
        require('view/aboutView.php');
    }



}