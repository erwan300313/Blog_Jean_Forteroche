<?php session_start()?>
<?php
require('controller/controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])){
        if($_GET['action'] == 'various'){
            if(isset($_GET['id'])){
                if($_GET['id'] > 0 AND $_GET['id'] < 50){
                    various($_GET['id']);
                }else{
                throw new Exception('Page Web inaccessible.');
                }
            }else{
                throw new Exception('Page Web inaccessible.');
            }
        }
        elseif($_GET['action'] == 'about'){
            about();
        }
        elseif($_GET['action'] == 'blog'){
            posts();
        }
        elseif($_GET['action'] == 'post'){
            if(isset($_GET['id'])){
                if($_GET['id'] > 0 AND $_GET['id'] < 50){
                    post($_GET['id']);
                }
                else{
                    throw new Exception('Page Web inaccessible.');
                }
            }else{
                throw new Exception('Page Web inaccessible.');
            }
        }
        elseif($_GET['action'] == 'comments'){
            getComment($_GET['id']);
        }
        else{
                throw new Exception('Page Web inaccessible.');
            }
        }
    else {
        indexPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    require('controller/rightBlockController.php');
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}

