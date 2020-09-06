<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fc001796a0.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/qv7aonmkdnd5f4ghrx4sugtxakuuiam2zc5ho2e03n55ttk0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    </head>
        
    <body>
        <header>
            <div class="headband">
                <?php
                if(isset($_SESSION['pseudo']) AND isset($_SESSION['password'])){
                ?>
                <p>Bonjour <?=$_SESSION['pseudo']?> / <i class="fas fa-house-user"></i><a href="index.php?action=membreArea#ancre">Espace membre</a> / <i class="fas fa-sign-out-alt"></i><a href="index.php?action=logOut">Déconnexion</a></p>
                <?php
                }else{
                ?>
                <p><a href="index.php?action=log"><i class="far fa-user"></i> Se connecter</a> / <a href="index.php?action=register"><i class="fas fa-sign-in-alt"></i> S'inscrire</a></p>
                <?php
                }
                ?>
            </div>
            <p class="logo"><img src="public/img/logo_400.png" alt="logo de Jean"></p>
            <nav>
                <ul class="menu">
                    <li class="buttonMenu accueil"><a href="index.php">Accueil</a></li>
                    <li class="buttonMenu a_propos"><a href="index.php?action=about#ancre">A propos</a></li>
                    <li class="buttonMenu blog"><a href="index.php?action=blog#ancre">Blog</a></li>
                    <li class="buttonMenu contact"><a href="">Contact</a></li>
                </ul>
            </nav>
        </header>
        <div class="divider"></div>
        <div class="banniere">
            <img src="public/img/banniere.jpg" alt="paysage Alaska" class="paysage">
            <img src="public/img/jean_f.jpg" alt="Portrait de Jean Forteroche" class="portrait">
        </div>
        <div class="blockInvisible" id="ancre"></div>
        <section class="section">
            <section class="leftSection"> 
                <?= $content ?>
            </section>
            <section class="rightSection">
                <article class="lastUser">
                    <h3>Nouveau membre</h3>
                    <p>Bienvenue à <?=htmlspecialchars($lastUser['pseudo'])?></p>
                    <p>Inscrit le <?=htmlspecialchars($lastUser['date_inscirption'])?></p>
                </article>   
                <article class="lastPost">
                    <h3>Dernier post</h3>
                    <h4><?=htmlspecialchars($lastPost['title'])?></h4>
                    <p>publié par <?=htmlspecialchars($lastPost['author'])?><br /> le <?=htmlspecialchars($lastPost['date_creation'])?></p>
                    <p>
                        <?=htmlspecialchars($lastPost['content'])?>
                        ... <a href="index.php?action=post&amp;id=<?=$lastPost['id']?>#ancre" class="readMore">Lire la suite</a>
                    </p>
                </article> 
            </section>
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