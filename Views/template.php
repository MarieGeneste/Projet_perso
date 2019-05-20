<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <base href="<?= $racineWeb ?>" />
        <link rel="stylesheet" href="Vendor/style.css" />
        <title><?= $this->pageTitle; ?></title>
    </head>

    <body>
        <main id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Developpeuse Web</h1></a>
            </header>
            <section id="contenu">

                <?= $content; ?>

            </section>
            <footer id="piedBlog">
                Site en MVC - PHP - POO - HTML - CSS
                Miss Libellule
            </footer>
        </main>
    </body>

</html>
