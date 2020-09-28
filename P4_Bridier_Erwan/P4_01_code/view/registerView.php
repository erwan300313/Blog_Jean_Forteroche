<?php $this->title = 'Page d\'inscription'; ?>

<article class="logIn">
    <h2>Creer votre compte</h2>
    <form action="index.php?action=register&amp;id_status=2" method="post" class="testForm">
        <label for="lastName">Nom :</label><br />
        <input type="text" id="lastName" name="lastName"/><br />
        <label for="firstName">Prénom :</label><br />
        <input type="text" id="firstName" name="firstName"/><br />
        <label for="pseudo">Pseudo :</label><br />
        <input type="text" id="pseudo" name="pseudo"/><br />
        <label for="password">Mot de passe :</label><br />
        <input type="password" id="password" name="password"/><br />
        <label for="mail">Adresse mail :</label><br />
        <input type="text" id="mail" name="mail"/><br />
        
        <input type="submit" value="Valider votre saisie" id="connectionButton"/>            
    </form>
</article>