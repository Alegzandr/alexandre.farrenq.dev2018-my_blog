<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sup'Teaching.fr | Créer un article</title>
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/jquery.sidr.dark.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php include('header.php'); ?>

<main role="main">
    <form name="new-article" action="/newarticle" method="post">
        <h3>Créer un article</h3>
        <br>

        <input type="text" name="title" placeholder="Titre de l'article" autofocus><br><br>
        <textarea name="content" cols="33" rows="14" placeholder="Contenu de l'article"></textarea><br>

        <br>
        <input type="submit">
    </form>
</main>

<?php include('footer.php'); ?>
<script src="/assets/js/newarticle.js"></script>
</body>
</html>
