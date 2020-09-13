<?php $this->title = 'Espace membre'; ?>

<article class="logIn">
    <h2>Espace membre</h2>
    <h3>Information personnelle</h3>
    <ul>
        <li>status : Administrateur</li>
        <li>Prénom : <?=$getUser['firstName']?></li>
        <li>Nom : <?=$getUser['lastName']?></li>
        <li>pseudo : <?=$getUser['pseudo']?></li>
        <li>Mail: <?=$getUser['mail']?></li>
        <li>date d'inscription: <?=$getUser['date_inscription']?></li>
    </ul>
</article>