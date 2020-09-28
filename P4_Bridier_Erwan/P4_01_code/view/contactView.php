<?php $this->title = "Page de contact"; ?>

<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>


    <article class="leftBlock">
        <h2>Page de contact</h2>
        <h3>Un renseignement ? Une proposition commerciale ? Tout son passe ici pour un contact professionnel.</h3>
        <form action="" method="post" class="formContact">
        <label for="lastName">Nom :</label>
        <input type="text" id="lastName" name="lastName"/><br />
        <label for="firstName">Prénom :</label>
        <input type="text" id="firstName" name="firstName"/><br />
        <label for="mail">Adresse mail :</label>
        <input type="text" id="mail" name="mail"/><br />
        <label for="content">Votre message :</label>       
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        
        <input type="submit" value="Envoyer le formulaire" id="connectionButton"/>            
    </form>
        
    </article>


<p class="homePage"><a href="index.php">Retour à la page d'accueil</a></p>