<?php $this->title = 'Modération des commentaires' ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=membreAreaLogin#ancre" class="linkPrevious">Retour à l'éspace membre</a>
</p>

<div id="commentAncre"></div>

<h2>Administration des commentaires</h2>

<article class="adminBlock adminComments">   
    <table>
        <thead>
            <td>Commentaire</td>
            <td>Nombre de signalement</td>
            <td>Action</td>
        </thead>
        <?php
        while ($data = $report->fetch())
        {
        ?>
        <tr>
            <td class="commentCell contentCell"><?=$data['content']?></td>
            <td class="reportCell contentCell"><?=$data['report']?></td>
            <td class="actionCell contentCell"><a href="index.php?action=restoreReport&amp;comment_id=<?=$data['id']?>">Rétablir</a><br /><br /><a href="index.php?action=deleteComment&amp;comment_id=<?=$data['id']?>&amp;adminDelet=true">Supprimer</a></td>
        </tr>
        
        <?php
        }
        ?>
    </table>
</article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=membreAreaLogin#ancre" class="linkPrevious">Retour à l'éspace membre</a>
</p>