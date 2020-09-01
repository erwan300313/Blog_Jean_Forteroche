<?php session_start()?>
<?php
require('controller/controller.php');
require('controller/indexController.php');
require('controller/aboutController.php');
require('controller/postController.php');
require('controller/commentController.php');

class Router{
    
    private $indexController;
    private $aboutController;
    private $postController;
    private $commentController;

    public function __construct(){
        $this->indexController = new IndexController();
        $this->aboutController = new AboutController();
        $this->postController = new PostController();
        $this->commentController = new CommentController();
    }

    public function routerRequest(){
        try { 
            if (isset($_GET['action'])){
                if($_GET['action'] == 'various'){
                    if(isset($_GET['id'])){
                        if(is_numeric($_GET['id'])){
                            if($_GET['id'] > 0 AND $_GET['id'] <= 15){
                                $this->aboutController->various($_GET['id']);
                            }
                            else{
                                throw new Exception('La varibale demander n\'est pas comprise entre 1 et 15.');
                            }
                            
                        }else{
                        throw new Exception('La varibale demander n\'est pas un nombre.');
                        }
                    }else{
                        throw new Exception('Page Web inaccessible.');
                    }
                }
                elseif($_GET['action'] == 'about'){
                    $this->aboutController->about();
                }
                elseif($_GET['action'] == 'blog'){
                    
                    $this->postController->posts();
                }
                elseif($_GET['action'] == 'post'){
                    if(isset($_GET['id'])){
                        if($_GET['id'] > 0 AND $_GET['id'] < 15){
                            
                            $this->postController->post($_GET['id']);
                        }
                        else{
                            throw new Exception('Page Web inaccessible.');
                        }
                    }else{
                        throw new Exception('Page Web inaccessible.');
                    }
                }
                elseif($_GET['action'] == 'comments'){
                    if(isset($_GET['id'])){
                        if($_GET['id'] > 0 AND $_GET['id'] < 15){
                            
                            $this->commentController->getComment($_GET['id']);
                        }
                        else{
                            throw new Exception('Page Web inaccessible.');
                        }
                    }else{
                        throw new Exception('Page Web inaccessible.');
                    }
                }
                else{
                        throw new Exception('Page Web inaccessible.');
                    }
                }
            else {
                $this->indexController->home(); /*Home page*/
            }
        }
        catch(Exception $e) { // If error ...
            $postManager = new PostManager();
            $lastPost = $postManager->lastPost();
            $userManager = new UserManager();
            $lastUser = $userManager->getLastUser();
            $errorMessage = $e->getMessage();
            require('view/errorView.php');
        }
    }
}