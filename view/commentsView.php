<?php $title = "Bienvenue sur le Blog"; ?>

<?php ob_start(); ?>

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
<h2><strong>Espace commentaire</strong></h2>

<?php     
if(isset($_GET['addComment'])){
    if(isset($_SESSION['pseudo'])){
    ?>
    <form action="index.php?action=addComment&amp;id=<?=$getExtractPost['id']?>#ancre" method="post">
            <label for="author">Votre pseudo :</label><br />
            <input type="text" id="pseudo" name="author" value="<?=$_SESSION['pseudo']?>"/><br />
            <textarea class="addComment" name="comment" placeholder="Votre commentaire ici ..."></textarea>
            <script>
                tinymce.init({
                selector: 'textarea',
                language : 'fr_FR',
                menubar: false,
                plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                });
            </script>
            <input type="submit" value="Envoyer le commentaire" id="addCommentButton"/><input type="submit" value="Annuler" id="addCommentButton" formaction='index.php?action=comments&amp;id=<?=$getExtractPost['id']?>#ancre'/>         
        </form>
    <?php 
    }else{
    ?>   
    <h3>Vous devez etre enregistrer et connecter pour ajouter un commentaire</h3>
    <?php
    }   
}else{
?>
    <h3><a href="index.php?action=comments&amp;id=<?=$getExtractPost['id']?>&amp;addComment=true#commentAncre">Ajouter un commentaire</a></h3>
<?php
}
while ($data = $getComments->fetch())
{
?>
    <article class="commentBlock">
        <h3><?=htmlspecialchars($data['author'])?> A commenter le  <?=htmlspecialchars($data['date_creation'])?></h3>
        <p>
            <?=nl2br(htmlspecialchars($data['content']))?>
            
        </p>
        <?php
        if(isset($_GET['event'])){
            if($_GET['event'] == 'reportComment'){
                if($_GET['commentId'] == $data['id']){
                    ?>
                    <form action="index.php?action=reportComment&amp;comment_id=<?=$data['id']?>&amp;post_id=<?=$getExtractPost['id']?>#ancre" method="post">
                        <?php
                        if(isset($_SESSION['pseudo'])){
                        ?>
                        <input type="hidden" name = "report_author" value="<?=$_SESSION['pseudo']?>">
                        <?php
                        }else{
                        ?>
                        <input type="hidden" name = "report_author" value="utilisateur non enregistrer ou non connecter">
                        <?php
                        }
                        ?>
                        <label for="reportReason"></label>
                        <select name="reportReason" class="reportReason">
                            <option value="">--Sélectionner un motif--</option>
                            <option value="Contenue non approprié">Contenue non approprié</option>
                            <option value="Contenu illégal">Contenu illégal</option>
                            <option value="Spam">Spam</option>
                        </select>
                        <input type="submit" value="Signaler">
                    </form> 
                    <?php   
                }
            }elseif($_GET['event'] == 'editComment'){
                if($_GET['commentId'] == $data['id']){
                    if(isset($_SESSION['pseudo'])){
                        if($_SESSION['pseudo'] == $data['author']){
                        ?>
                            <form action="index.php?action=editComment&amp;post_id=<?=$getExtractPost['id']?>&amp;comment_id=<?=$data['id']?>#ancre" method="post">
                                <textarea class="addComment" name="comment"><?=$data['content']?></textarea>
                                <script>
                                    tinymce.init({
                                    selector: 'textarea',
                                    language : 'fr_FR',
                                    menubar: false,
                                    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                                    toolbar: 'bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                                    toolbar_mode: 'floating',
                                    tinycomments_mode: 'embedded',
                                    tinycomments_author: 'Author name',
                                    });
                                </script>
                                <input type="submit" value="Modifier" id="editCommentButton"/>            
                            </form>
                        <?php
                        }else{
                        ?>
                            <h3>Vous devez etre l'auteur ou administareur pour modifier <button onclick="window.location.href='index.php?action=comments&amp;id=<?=$getExtractPost['id']?>#ancre';">OK</button></h3>
                        <?php
                        }
                    }else{
                    ?>
                    <h3>Vous devez etre l'auteur ou administareur pour modifier <button onclick="window.location.href='index.php?action=comments&amp;id=<?=$getExtractPost['id']?>#ancre';">OK</button></h3>
                    <?php
                    } 
                }
            }     
        }else{
        ?>
        <p><button onclick="window.location.href='index.php?action=comments&amp;event=reportComment&amp;id=<?=$getExtractPost['id']?>&amp;commentId=<?=$data['id']?>&amp;reportComment=true#commentAncre';">Signaler</button> <button onclick="window.location.href='index.php?action=comments&amp;event=editComment&amp;id=<?=$getExtractPost['id']?>&amp;commentId=<?=$data['id']?>&amp;editComment=true#commentAncre';">Modifier</button></p>
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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>