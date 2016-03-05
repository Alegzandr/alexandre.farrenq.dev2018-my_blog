<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Créer un article</title>
    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include('header.php'); ?>

<form name="new-article" action="/newarticle" method="post">
    <h3>Créer un article</h3>
    <br>

    <input type="text" name="title" placeholder="Titre de l'article"><br>
    <textarea name="content" cols="150" rows="30" placeholder="Contenu de l'article"></textarea>

    <br>
    <input type="submit">
</form>

<?php include('footer.php'); ?>
<script src="../assets/js/newarticle.js"></script>
</body>
</html>
