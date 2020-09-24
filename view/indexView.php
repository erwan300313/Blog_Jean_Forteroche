<?php $this->title = 'Billet simple pour l\'Alaska'; ?>

<article class="biography">
    <h2>Biographie</h2>
    <h3>
        Publié le <?=$syn['date_creation']?> Par <?= htmlspecialchars($syn['author'])?>
    </h3>
    <p>
        <?= nl2br(htmlspecialchars($bio['content'])) ?>
        ... <a href="index.php?action=various&amp;id=<?=$bio['id']?>#ancre" class="readMore">Lire la suite</a>
    </p>
</article>

<article class="synopsys">
    <h2>Synopsys</h2>
    <h3>
        Publié le <?=$syn['date_creation']?> Par <?= htmlspecialchars($syn['author'])?>
    </h3>
    <p>
        <?= htmlspecialchars($syn['content']) ?>
        ... <a href="index.php?action=various&amp;id=<?=$syn['id']?>#ancre" class="readMore">Lire la suite</a>
    </p>
</article> 
<article class="lowerBlock">
    <?php
    while ($data = $indexPost->fetch())
    {
    ?>
    <div class="firstPost">
        <h2><?=htmlspecialchars($data['title'])?></h2>
        <h3>publié le <?=htmlspecialchars($data['date_creation'])?> par <?=$data['author']?></h3>
        <p>
            <?=htmlspecialchars($data['content'])?>
            ... <a href="index.php?action=post&amp;post_id=<?=$data['id']?>#ancre" class="readMore">Lire la suite</a>
        </p>
    </div>
    <?php
    }
    ?>
</article>