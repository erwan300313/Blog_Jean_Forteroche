<?php $this->title = 'Espace membre'; ?>

<article class="logIn">
    <h2>Espace membre</h2>
    <h3>Information personnelle</h3>
    <ul>
        <li>status : <?php 
            if($_SESSION['id_status'] == '1'){
            ?>
            Administrateur
            <?php
            }else{
            ?>
            Utilisateur
            <?php
            }
            ?>
            </li>
        <li>Prénom : <?=$getUser['firstName']?></li>
        <li>Nom : <?=$getUser['lastName']?></li>
        <li>pseudo : <?=$getUser['pseudo']?></li>
        <li>Mail: <?=$getUser['mail']?></li>
        <li>date d'inscription: <?=$getUser['date_inscription']?></li>
    </ul>
</article>

<?php
if($_SESSION['id_status'] == '1'){
?>
<h3>Ajouter un billet</h3>
<form action="index.php?action=addPost&amp;author=<?=$getUser['pseudo']?>" method="post">
    <label for="title">Titre du billet : </label>
    <input type="text" name="title" id="title"><br />
    <textarea name="content">Votre nouveau post ICI.</textarea>
    <script>
        tinymce.init({
        selector: 'textarea',
        language : 'fr_FR',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        });
    </script>
    <input type="submit" value="Poster le billet" id="connectionButton"/> 
</form>


<?php
}
?>
