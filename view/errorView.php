<?php $title = 'Oups'; ?>

<?php ob_start(); ?>
<h1>Vous voila arriver sur la page d'erreur</h1>
<p><?= $errorMessage ?></p>
 

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>