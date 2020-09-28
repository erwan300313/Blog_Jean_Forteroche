<?php $this->title = 'Modifier votre commentaire.'; ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$_GET['post_id']?>#ancre" class="linkPrevious">Retour au Post complet</a>

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
        <form action="index.php?action=editComment&amp;comment_id=<?=$getComment['id']?>&amp;post_id=<?=$getComment['post_id']?>#ancre" method="post" class="testForm">
            <label for="editComment">Saisissez votre nouveau texte ci-dessous :</label><br />
            <textarea name="editComment" id="editComment" cols="50" rows="6"><?=$getComment['content']?></textarea><br />
            <input type="submit" value="Valider la modification" class="editCommentButton"/>            
        </form>
    </article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>