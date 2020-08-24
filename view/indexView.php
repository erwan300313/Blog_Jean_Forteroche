<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<section class="section">
    <section class="firstSection"> 
        
                <article class="biography">
                    <h2>Biographie</h2>
                    <p>
                        Publié le <?=$syn['date_creation']?> Par <?= htmlspecialchars($syn['author'])?>
                    </p>
                    <p>
                        <?= nl2br(htmlspecialchars($bio['content'])) ?>
                        ... <a href="" class="readMore">Lire la suite</a>
                    </p>
                </article>
            
                <article class="synopsys">
                    <h2>Synopsys</h2>
                    <p>
                        Publié le <?=$syn['date_creation']?> Par <?= htmlspecialchars($syn['author'])?>
                    </p>
                    <p>
                        <?= htmlspecialchars($syn['content']) ?>
                        ... <a href="" class="readMore">Lire la suite</a>
                    </p>
                </article>
            
    </section>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>