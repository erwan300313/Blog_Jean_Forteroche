<?php $title = "A propos"; ?>

<?php ob_start(); ?>
<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>

<?php
while ($data = $getFullVarious->fetch())
{
?>
    <article class="leftBlock">
        <div class="<?=$data['title']?>">
            <h2><?=htmlspecialchars($data['title'])?></h2>
            <h3>publié le <?=htmlspecialchars($data['date_creation'])?> par <?=$data['author']?></h3>
            <p>
                <?=htmlspecialchars($data['content'])?>
                ... <a href="index.php?action=various&amp;id=<?=$data['id']?>" class="readMore">Lire la suite</a>
            </p>
            <br/>
        </div>
    </article>
<?php
}
?>

<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>