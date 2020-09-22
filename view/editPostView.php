<?php $this->title = 'Modifier votre commentaire.'; ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=postsMode#ancre" class="linkPrevious">Retour à l'administation des billets</a>
</p>

<div id="Ancre"></div>
<h2><strong>Modifier votre commentaire</strong></h2>

<article>
    <form action="index.php?action=editPost&amp;post_id=<?=$getPost['id']?>#ancre" method="post">
        <label for="title">Titre : </label>
        <input type="text" name="title" id="title" value="<?=$getPost['title']?>"><br />
        <textarea name="content" rows="50"><?=$getPost['content']?></textarea>
        
        <input type="submit" value="Poster le billet modifier" class="addPostButton" id="connectionButton"/> 
    </form>
</article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=postsMode#ancre" class="linkPrevious">Retour à l'administation des billets</a>
</p>