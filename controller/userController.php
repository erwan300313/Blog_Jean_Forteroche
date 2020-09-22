<?php
require_once('controller.php');

Class UserController{

    private $userManager;
    private $postManager;

    public function __construct(){
        $this->userManager = new UserManager();
        $this->commentManager = new CommentManager();
        $this->postManager = new PostManager();

    }

    function membreArea($pseudo, $password){
        $getUser = $this->userManager->userCheck($pseudo);
        $getReport = $this->commentManager->getReportComment();
        $passWordVerify = password_verify($password, $getUser['password']);

        if($getUser == false){
            throw new Exception('Il yas un probleme dans votre pseudo ou votre mot de pass.');
        }else{
            if($passWordVerify){
                $_SESSION['pseudo'] = $getUser['pseudo'];
                $_SESSION['id_status'] = $getUser['id_status'];
                $view = new ViewManager('membreArea');
                $view->generate(array('getUser' => $getUser, 'getReport' => $getReport));
            }else{
                throw new Exception('Il yas un probleme dans votre pseudo ou votre mot de pass.');
            }
        }
    }

    function membreAreaLogin($pseudo){
        $getUser = $this->userManager->userCheck($pseudo);
        $getReport = $this->commentManager->getReportComment();
        $view = new ViewManager('membreArea');
        $view->generate(array('getUser' => $getUser, 'getReport' => $getReport));
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
            $this->membreArea($pseudo, $password);
        }else{
            throw new Exception('Votre pseudo est déja utilisé par un autre utilisateur, veuillez entré un nouveau pseudo');
        }
    }
    

}