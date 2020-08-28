<?php $title = htmlspecialchars($getVarious['title']); ?>

<?php ob_start(); ?>
<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>
<article class="leftBlock">
    <h2><?=htmlspecialchars($getVarious['title'])?></h2>
    <h3>Publié le <?=htmlspecialchars($getVarious['date_creation'])?> par <?=htmlspecialchars($getVarious['author'])?></h3>
    <p><?=nl2br(htmlspecialchars($getVarious['content']))?></p>
    
</article>
<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>