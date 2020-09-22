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
            <li class="buttonAdminMenu addPost"><a href="index.php?action=addPostView#ancre">Ajouter un billet</a></li>
            <li class="buttonAdminMenu addPost"><a href="index.php?action=postsMode#ancre">Modération des billets</a></li>
            <li class="buttonAdminMenu addPost"><a href="index.php?action=commentModeView">Modération des commentaires</a></li>
        </ul>
    </div>

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