<?php $this->title = htmlspecialchars($getExtractPost['title']); ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;post_id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>


<div id="commentAncre"></div>
<article class="leftBlock">
    <h2><?=htmlspecialchars($getExtractPost['title'])?></h2>
    <h3>publié le <?=htmlspecialchars($getExtractPost['date_creation'])?> par <?=$getExtractPost['author']?></h3>
    <p>
        <?=nl2br(html_entity_decode($getExtractPost['content']))?> ...
    </p>
    <br/>
</article>

<h3 class="newCom"><a href="index.php?action=addCommentView&amp;post_id=<?=$getExtractPost['id']?>#ancre">Ajouter un commentaire</a></h3>

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
        <?php
        if(isset($_SESSION['pseudo'])){
        ?>
        <div class="commentButton">
            <a href="index.php?action=getComment&amp;comment_id=<?=$data['id']?>&amp;post_id=<?=$data['post_id']?>&amp;author=<?=$data['author']?>#ancre">Modifier</a> 
            <a href="index.php?action=reportComment&amp;comment_id=<?=$data['id']?>&amp;report=<?=$data['report']?>&amp;post_id=<?=$data['post_id']?>#ancre">Signaler</a> 
            <a href="index.php?action=deleteCommentView&amp;comment_id=<?=$data['id']?>&amp;author=<?=$data['author']?>&amp;post_id=<?=$data['post_id']?>#ancre">Supprimer</a>
        </div>
        <?php
        }
        ?>
    </article>
<?php
}
?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour au Post complet</a>
</p>