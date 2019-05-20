<?php $this->pageTitle = 'Mon site !'; ?>

<?php foreach ($articles as $article): ?>
    <article>
        <header>
            <a href="<?= "index.php?controller=Article&id=". $article['artId'] ?>">
                <h1 class="titreBillet"><?= $article['artTitle'] ?></h1>
            </a>
            <time><?= $article['artDate'] ?></time>
        </header>
        <p>
            <?= $article['artContent'] ?>
        </p>
    </article>
<?php endforeach; ?>
