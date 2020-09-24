<?php $this->title = 'Nouveau billet' ?>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour à l'éspace membre</a>
</p>


<div id="commentAncre"></div>

<h2>Ajouter un nouveau post</h2>

<article>
    <form action="index.php?action=addPost&amp;author=<?=$_SESSION['pseudo']?>#ancre" method="post">
        <label for="title">Titre : </label>
        <input type="text" name="title" id="title"><br />
        <textarea id="tiny" name="content" placeholder="Tapez votre texte ICI"></textarea>
        <input type="submit" value="Poster le billet" class="addPostButton" id="connectionButton"/> 
    </form>
</article>

<p class="homePage">
    <a href="index.php">Retour à la page d'accueil</a>
    <a href="index.php?action=post&amp;id=<?=$getExtractPost['id']?>#ancre" class="linkPrevious">Retour à l'éspace membre</a>
</p>