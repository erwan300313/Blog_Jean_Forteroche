<?php $this->title = 'Supprimer votre commentaire.'; ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=comments&amp;id=<?=$_GET['post_id']?>#ancre" class="linkPrevious">Retour a la page de commentaire</a>

</p>

<div id="Ancre"></div>
<h2><strong>Êtes-vous sûr de vouloir supprimer ce commentaire ?</strong></h2>

    <article class="commentBlock">
        <h3><?=htmlspecialchars($getComment['author'])?> A commenter le  <?=htmlspecialchars($getComment['date_creation'])?></h3>
        <p>
            <?=nl2br(htmlspecialchars($getComment['content']))?>
        </p>
    </article>
    <div class="commentButton">
        <a href="index.php?action=deleteComment&amp;comment_id=<?=$getComment['id']?>&amp;post_id=<?=$getComment['post_id']?>#ancre" class="editCommentButton">Valider la supréssion</a>
    </div>
    
<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getComment['post_id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>