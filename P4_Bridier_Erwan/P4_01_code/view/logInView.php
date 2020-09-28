<?php $this->title = 'Page de Connexion'; ?>

<article class="logIn">
    <h2>Espace connexion</h2>
    <form action="" method="post" class="testForm">
        <label for="pseudo">Pseudo :</label><br />
        <input type="text" id="pseudo" name="pseudo"/><br />
        <label for="password">Mot de passe :</label><br />
        <input type="password" id="password" name="password"/><br />
        
        <input type="submit" value="Connexion" id="connectionButton" formAction="index.php?action=membreLogin#ancre"/>            
    </form>
</article>