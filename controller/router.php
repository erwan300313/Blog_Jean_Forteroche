<?php session_start()?>
<?php
require('controller/controller.php');
require('controller/indexController.php');
require('controller/aboutController.php');
require('controller/postController.php');
require('controller/commentController.php');
require('controller/userController.php');


class Router{
    
    private $indexController;
    private $aboutController;
    private $postController;
    private $commentController;
    private $userController;

    public function __construct(){
        $this->indexController = new IndexController();
        $this->aboutController = new AboutController();
        $this->postController = new PostController();
        $this->commentController = new CommentController();
        $this->userController = new UserController();
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
                            
                            $this->commentController->getComments($_GET['id']);
                        }
                        else{
                            throw new Exception('Page Web inaccessible.');
                        }
                    }else{
                        throw new Exception('Page Web inaccessible.');
                    }
                }
                elseif($_GET['action'] == 'getComment'){
                    if(isset($_GET['comment_id'])){
                        $this->commentController->getEditComment($_GET['comment_id']);
                    }
                }
                elseif($_GET['action'] == 'editComment'){
                    if(isset($_POST['editComment'])){
                        $this->commentController->editComment($_GET['comment_id'], $_POST['editComment']);
                        $this->commentController->getComments($_GET['post_id']);
                    }else{
                        throw new Exception('Vous devez saisir un commentaire.');
                    } 
                }
                elseif($_GET['action'] == 'addCommentView'){
                    $this->commentController->addCommentView($_GET['post_id']);
                }
                elseif($_GET['action'] == 'addComment'){
                    if(isset($_POST['newComment'])){
                        $this->commentController->addComment($_GET['post_id'], $_POST['newComment'], $_POST['pseudo']);
                    }else{
                        throw new Exception('Vous devez saisir un commentaire.');
                    }
                }
                elseif($_GET['action'] == 'deleteCommentView'){
                    $this->commentController->deleteCommentView($_GET['comment_id'], $_GET['post_id']);
                }
                elseif($_GET['action'] == 'deleteComment'){
                    $this->commentController->deleteComment($_GET['comment_id']);
                }
                elseif($_GET['action'] == 'reportComment'){
                    $this->commentController->reportComment($_GET['comment_id'], $_GET['report']);
                }
                elseif($_GET['action'] == 'log'){
                    $view = new ViewManager('login');
                    $view->generate(array());
                }
                elseif($_GET['action'] == 'membreLogin'){
                    $this->userController->membreArea($_POST['pseudo']);
                }
                elseif($_GET['action'] == 'registerView'){
                    $view = new ViewManager('register');
                    $view->generate(array());
                }
                elseif($_GET['action'] == 'register'){
                    if(empty($_POST['lastName']) OR empty($_POST['firstName']) OR empty($_POST['pseudo']) OR empty($_POST['password']) OR empty($_POST['mail'])){
                        throw new Exception('Vous devez remplir tout les champs du formulaire d\'inscription.');
                    }else{
                        $this->userController->addUser($_POST['lastName'], $_POST['firstName'], $_POST['pseudo'], $_POST['password'], $_POST['mail'] );
                    }
                    
                }
                elseif($_GET['action'] == 'logOut'){
                    $this->userController->logOut();
                }
                
            }
            else {
                $this->indexController->home(); //Home page
            }
        }
        catch(Exception $e) { // If error ...
            $errorMessage = $e->getMessage();
            $view = new ViewManager('error');
            $view->generate(array('errorMessage' => $errorMessage));
        }
    }
}