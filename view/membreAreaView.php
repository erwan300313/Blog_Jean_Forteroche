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
    <div class="adminBlock">
        <h2>Menu Administration</h2>
        <ul class="adminMenu">
            <li class="buttonAdminMenu addPost"><a href="index.php?action=addPostView">Ajouter un post</a></li>
            <li class="buttonAdminMenu addPost"><a href="index.php?action=postsModeView">Modération des posts</a></li>
            <li class="buttonAdminMenu addPost"><a href="index.php?action=commentModeView">Modération des commentaires</a></li>
        </ul>
    </div>
    
    <article class="adminBlock adminPosts">
        <h2>Modération des posts</h2>
        <div>
            <table>
                <thead>
                    <td>Titre</td>
                    <td>Extrait du post</td>
                    <td>Action</td>
                </thead>
                <?php
                while ($data = $getPosts->fetch())
                {
                    ?>
                    <tr>
                        <td class="commentCell contentCell"><?=$data['title']?></td>
                        <td class="reportCell contentCell"><?=nl2br(html_entity_decode($data['content']))?></td>
                        <td class="actionCell contentCell"><a href="index.php?action=restoreReport&amp;comment_id=<?=$data['id']?>">Modifier</a><br /><br /><a href="index.php?action=deleteComment&amp;comment_id=<?=$data['id']?>&amp;adminDelet=true">Supprimer</a></td>
                    </tr>
                    
                    <?php
                    }
                    ?>
            </table>
        </div>
    </article>
    
    <!-- <form action="index.php?action=addPost&amp;author=<?=$getUser['pseudo']?>" method="post">
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
    </form> -->
    <article class="adminBlock adminComments">
        <h2>Modération des commentaires</h2>
        <div>
            <table>
                <thead>
                    <td>Commentaire</td>
                    <td>Nombre de signalement</td>
                    <td>Action</td>
                </thead>
                <?php
                while ($data = $getReport->fetch())
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
        </div>
    </article>
<?php
}
?>