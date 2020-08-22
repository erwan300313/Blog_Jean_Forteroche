<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="../public/css/style.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
    </head>
        
    <body>
        <head>
            <div class="headband"></div>
            <p class="logo"><img src="../public/img/logo_400.png" alt="logo de Jean"></p>
            <ul class="menu">
                <li class="buttonMenu accueil"><a href="">Accueil</a></li>
                <li class="buttonMenu a_propos"><a href="">A propos</a></li>
                <li class="buttonMenu blog"><a href="">Blog</a></li>
                <li class="buttonMenu contact"><a href="">Contact</a></li>
            </ul>
            
            <div class="banniere">
                <img src="../public/img/banniere.jpg" alt="paysage Alaska" class="paysage">
                <img src="../public/img/jean_f.jpg" alt="Portrait de Jean Forteroche" class="portrait">
            </div>
        </head>
        
        
        <?= $content ?>
        
        <footer></footer>
    </body>
</html>