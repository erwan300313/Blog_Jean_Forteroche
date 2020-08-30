<?php $title = "Bienvenue sur le Blog"; ?>

<?php ob_start(); ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>

</p>

<article class="leftBlock">
    <h2><?=htmlspecialchars($getExtractPost['title'])?></h2>
    <h3>publié le <?=htmlspecialchars($getExtractPost['date_creation'])?> par <?=$getExtractPost['author']?></h3>
    <p>
        <?=nl2br(htmlspecialchars($getExtractPost['content']))?> ...
    </p>
    <br/>
</article>
<h2><strong>Espace commentaire</strong></h2>
<?php
while ($data = $getComments->fetch())
{
?>
    <article class="commentBlock">
        <h3><?=htmlspecialchars($data['author'])?> A commenter le  <?=htmlspecialchars($data['date_creation'])?></h3>
        <p>
            <?=nl2br(htmlspecialchars($data['content']))?>
            
        </p>
    </article>
<?php
}
?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>