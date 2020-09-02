<?php
require_once('controller.php');

Class UserController{

    private $postManager;
    private $userManager;
    private $variousManager;

    public function __construct(){
        $this->postManager = new PostManager();
        $this->userManager = new UserManager();
        $this->variousManager = new VariousManager();
    }

    function logIn(){
        require('rightBlockController.php');
        require('view/logInView.php');
    }

    function membreArea($pseudo, $password){
        require('rightBlockController.php');
        $userCheck = $this->userManager->userCheck($pseudo, $password);
        if($userCheck == false){
            throw new Exception('Il yas un probleme dans votre pseudo ou votre mot de pass.');
        }else{
            $_SESSION['id'] = $password;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
            $getUser = $this->userManager->getUser($userCheck['id']);
            require('view/membreAreaView.php');
        }
    }

    function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }

}