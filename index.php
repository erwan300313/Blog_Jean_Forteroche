<?php session_start()?>
<?php
require('controller/controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if($_GET['action'] == 'various'){
                various($_GET['id']);
        }
        elseif($_GET['action'] == 'about'){
            about();
        }
        else{
            throw new Exception('Un probleme est survenue durant votre navigation et nous en somme désoler.');
        }
    }
    else {
        indexPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}

