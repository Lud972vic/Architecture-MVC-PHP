<h1>Liste des articles </h1>

<?php foreach ($articles as $article): ?>
    <h3><a href="/articles/lire/<?= $article['slug'] ?>"><?= $article['titre'] ?></a></h3>
    <p><?= $article['contenu'] ?></p>
<?php endforeach; ?>
