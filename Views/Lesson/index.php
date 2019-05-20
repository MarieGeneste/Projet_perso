<!-- Définit le titre de la page à insérer dans <title> du template -->
<?php $this->pageTitle = 'Mon site - '. $this->cleanValue($lesson['lessonoTitle']); ?>

<!-- Contenu et données à insérer dans la partie $content du template -->
<article>
    <header>
        <h1 class="titreBillet"><?= $this->cleanValue($lesson['lessonoTitle']) ?></h1>
        <time><?= $this->cleanValue($lesson['lessonoDate']) ?></time>
    </header>
    <p>
        <?= $this->cleanValue($lesson['lessonoContent']) ?>
    </p>
</article>
<section>
    <header>
        <h1 id="titreReponses"> <?= $this->cleanValue($lesson['lessonoTitle']) ?> - Commentaires</h1>
    </header>
    <?php foreach ($comments as $comment): ?>
        <section>
            <p>Le <?= $this->cleanValue($comment['comDate']) ?>, <?= $this->cleanValue($comment['comAuthor']) ?> dit :</p>
            <p><?= $this->cleanValue($comment['comContent']) ?></p>
        </section>
    <?php endforeach; ?>
    <form method="post" action="index.php?controller=Lesson&id=<?=$lesson['lessonoId'] ?>">

        <input id="author" name="comAuthor" type="text" placeholder="Votre pseudo" required /><br />
        <textarea id="newComContent" name="newComContent" rows="4" placeholder="Votre commentaire" required></textarea><br />
        <input type="hidden" name="id" value="<?=$lesson['lessonoId'] ?>" />
        <input type="hidden" name="action" value="commentsSettings" />
        <input type="submit" value="Commenter" />
    </form>
</section>
