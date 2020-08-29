<?php $title = "Bienvenue sur le Blog"; ?>

<?php ob_start(); ?>
<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>

<?php
while ($data = $getPosts->fetch())
{
?>
    <article class="leftBlock">
        <h2><?=htmlspecialchars($data['title'])?></h2>
        <h3>publié le <?=htmlspecialchars($data['date_creation'])?> par <?=$data['author']?></h3>
        <p>
            <?=nl2br(htmlspecialchars($data['content']))?>
            ... <a href="index.php?action=post&amp;id=<?=$data['id']?>" class="readMore">Lire la suite</a>
        </p>
        <br/>
    </article>
<?php
}
?>

<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>