<?php $this->title = htmlspecialchars($getExtractPost['title']); ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>

</p>

<div id="Ancre"></div>
<h2><strong>Modifier votre commentaire</strong></h2>

    <article class="commentBlock">
        <h3><?=htmlspecialchars($getComment['author'])?> A commenter le  <?=htmlspecialchars($getComment['date_creation'])?></h3>
        <p>
            <?=nl2br(htmlspecialchars($getComment['content']))?>
        </p>
    </article>
    <article>
        <form action="" method="post" class="testForm">
            <label for="newComment">Modifier votre commentaire :</label><br />
            <textarea name="newComment" id="newComment" cols="50" rows="6"><?=$getComment['content']?></textarea><br />
            <input type="submit" value="Valider la modification" id="connectionButton" formAction="index.php?action=membreLogin#ancre"/>            
        </form>
    </article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>