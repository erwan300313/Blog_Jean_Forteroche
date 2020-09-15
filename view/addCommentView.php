<?php $this->title = htmlspecialchars($getExtractPost['title']); ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>

</p>


<div id="commentAncre"></div>
<article class="leftBlock">
    <h2><?=htmlspecialchars($getExtractPost['title'])?></h2>
    <h3>publié le <?=htmlspecialchars($getExtractPost['date_creation'])?> par <?=$getExtractPost['author']?></h3>
    <p>
        <?=nl2br(htmlspecialchars($getExtractPost['content']))?> ...
    </p>
    <br/>
</article>

<h2><strong>Ajouter un commentaire</strong></h2>

<article>
        <form action="index.php?action=addComment&amp;post_id=<?=$getExtractPost['id']?>#ancre" method="post">
            <label for="pseudo">Votre pseudo:</label><br />
            <input type="text" id="pseudo" name="pseudo" value="<?=$_SESSION['pseudo']?>"/><br />
            <label for="newComment">Saisissez votre commentaire ci-dessous:</label><br />
            <textarea name="newComment" id="newComment" cols="50" rows="6"></textarea><br />
            <input type="submit" value="Envoyer le nouveau commentaire" class="editCommentButton"/>            
        </form>
    </article>



<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>