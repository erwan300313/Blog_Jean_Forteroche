<?php $this->title = "A propos"; ?>

<p class="homePage" id="ancre"><a href="index.php">Retour à la page d'accueil</a></p>

<?php
while ($data = $getFullVarious->fetch())
{
?>
    <article class="leftBlock">
        <h2><?=htmlspecialchars($data['title'])?></h2>
        <h3>publié le <?=htmlspecialchars($data['date_creation'])?> par <?=$data['author']?></h3>
        <p>
            <?=nl2br(htmlspecialchars($data['content']))?>
            ... <a href="index.php?action=various&amp;id=<?=$data['id']?>#ancre" class="readMore">Lire la suite</a>
        </p>
        <br/>
    </article>
<?php
}
?>

<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>