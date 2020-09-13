<?php
require_once('controller.php');

Class UserController{

    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
    }

    function logIn(){
        $view = new ViewManager('login');
        $view->generate(array());
    }

    function membreArea($pseudo, $password){
        $userCheck = $this->userManager->userCheck($pseudo, $password);
        if($userCheck == false){
            throw new Exception('Il yas un probleme dans votre pseudo ou votre mot de pass.');
        }else{
            $_SESSION['id'] = $password;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
            $getUser = $userCheck;
            $view = new ViewManager('membreArea');
            $view->generate(array('getUser' => $getUser));
        }
    }

    function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }

}