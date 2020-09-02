<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<article class="logIn">
    <h2>Espace connexion</h2>
    <form action="" method="post" class="testForm">
        <label for="pseudo">Pseudo :</label><br />
        <input type="text" id="pseudo" name="pseudo"/><br />
        <label for="password">Mot de passe :</label><br />
        <input type="password" id="password" name="password"/><br />
        <div>
            <input type="submit" value="Connection" class="submit" formAction="index.php?action=membreLogin#ancre"/>            
        </div>
    </form>
</article>
   
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>