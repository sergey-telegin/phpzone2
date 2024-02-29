<?php include __DIR__ . '/../header.php'; ?>

 <?php /** @var $article \App\MyProject\Models\Articles\Article */?>

    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?=$article->getAuthor()->getNickname()?></p>
<?php include __DIR__ . '/../footer.php'; ?>