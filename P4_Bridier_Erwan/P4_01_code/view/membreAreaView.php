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
            <li class="buttonAdminMenu addPost"><a href="index.php?action=commentMode#ancre">Modération des commentaires</a></li>
        </ul>
    </div>
<?php
}
?>