<?php $title = "Bienvenue sur le Blog"; ?>

<?php ob_start(); ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a> 
    <a href="index.php?action=comments&amp;id=<?=$getPost['id']?>#ancre" class="linkPrevious">Accéder au commentaire de ce Post</a>
</p>

<article class="leftBlock">
    <h2><?=htmlspecialchars($getPost['title'])?></h2>
    <h3>publié le <?=htmlspecialchars($getPost['date_creation'])?> par <?=$getPost['author']?></h3>
    <p>
        <?=nl2br(htmlspecialchars($getPost['content']))?>
    </p>
    <br/>
</article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=comments&amp;id=<?=$getPost['id']?>#ancre" class="linkPrevious">Accéder au commentaire de ce Post</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>