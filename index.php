<?php session_start()?>
<?php
require('controller/controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}

