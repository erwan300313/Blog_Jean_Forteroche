<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<section class="section">
    <section class="firstSection"> 
        <?php
        while ($data = $posts->fetch()){
            if($data['id'] == '1'){
            ?>
                <article class="biography">
                    <h2>Biographie</h2>
                    <p>publié le <?=$data['date_creation']?></p>
                    <p>
                        <?= htmlspecialchars($data['author'])?><br/>
                        <?= nl2br(htmlspecialchars($data['content'])) ?>
                    </p>
                </article>
            <?php
            }
            if($data['id'] == '2'){
            ?>
                <article class="synopsys">
                    <h2>Synopsys</h2>
                    <p>publié le <?=$data['date_creation']?></p>
                    <p>
                        <?= htmlspecialchars($data['author'])?><br/>
                        <?= htmlspecialchars($data['content']) ?>
                    </p>
                </article>
            <?php
            }}
            ?>
    </section>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>