<?php $this->title = 'Modération des posts' ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=membreAreaLogin#ancre" class="linkPrevious">Retour à l'éspace membre</a>
</p>

<div id="commentAncre"></div>

<h2>Administration des billets</h2>

<article class="adminBlock adminPosts">
    <table>
        <thead>
            <td>Titre</td>
            <td>Extrait du billet</td>
            <td>Action</td>
        </thead>
        <?php
        while ($data = $getPosts->fetch())
        {
            ?>
            <tr>
                <td class="titleCell contentCell"><?=$data['title']?></td>
                <td class="reportCell contentCell"><?=nl2br(html_entity_decode($data['content']))?> ...</td>
                <td class="actionCell contentCell"><a href="index.php?action=editPostView&amp;post_id=<?=$data['id']?>#ancre">Modifier</a><br /><br /><a href="index.php?action=deletePost&amp;post_id=<?=$data['id']?>#ancre">Supprimer</a></td>
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