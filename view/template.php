<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l'Alaska</title>
        <link href="../public/css/style.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fc001796a0.js" crossorigin="anonymous"></script>

    </head>
        
    <body>
        <head>
            <div class="headband"></div>
            <p class="logo"><img src="../public/img/logo_400.png" alt="logo de Jean"></p>
            <nav>
                <ul class="menu">
                    <li class="buttonMenu accueil"><a href="">Accueil</a></li>
                    <li class="buttonMenu a_propos"><a href="">A propos</a></li>
                    <li class="buttonMenu blog"><a href="">Blog</a></li>
                    <li class="buttonMenu contact"><a href="">Contact</a></li>
                </ul>
            </nav>
            <div class="banniere">
                <img src="../public/img/banniere.jpg" alt="paysage Alaska" class="paysage">
                <img src="../public/img/jean_f.jpg" alt="Portrait de Jean Forteroche" class="portrait">
            </div>
        </head>
        <section>
            <?= $content ?>
        </section>
        <footer>
            <div class="footer_block">
                <ul class="footer_menu">
                    <li><a href="">Accueil / </a></li>
                    <li><a href="">A propos / </a></li>
                    <li><a href="">Blog / </a></li>
                    <li><a href="">Contact</a></li>
                </ul>
                <ul class="footer_social_network">
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-google-plus-square"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href=""><i class="fas fa-share-alt-square"></i></a></li>
                </ul>
            </div>
            <p class='copyright'>Copyright © 2020 | Bridier Corporation | Billet simple pour l'Alaska </p>
        </footer>
    </body>
</html>