<?php
require_once('controller.php');

Class UserController{

    private $userManager;

    public function __construct(){
        $this->userManager = new UserManager();
    }

    function membreArea($pseudo){
        $userCheck = $this->userManager->userCheck($pseudo);
        if($userCheck == false){
            throw new Exception('Il yas un probleme dans votre pseudo ou votre mot de pass.');
        }else{
            $_SESSION['id'] = $userCheck['id'];
            $_SESSION['pseudo'] = $userCheck['pseudo'];
            $_SESSION['id_status'] = $userCheck['id_status'];
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

    function addUser($lastName, $firstName, $pseudo, $password, $mail){
        $userCheck = $this->userManager->userCheck($pseudo);
        if($userCheck == false){
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->userManager->addUser($lastName, $firstName, $pseudo, $pass_hache, $mail, $_GET['id_status']);
            $this->membreArea($pseudo);
        }else{
            throw new Exception('Votre pseudo est déja utilisé par un autre utilisateur, veuillez entré un nouveau pseudo');
        }
    }
    

}