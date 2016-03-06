<?php
$id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
$title = ArticleModel::getTitle($this->pdo, $id);
$content = ArticleModel::getContent($this->pdo, $id);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>
        Sup'Teaching.fr | Éditer
        <?php echo('"' . $title . '"'); ?>
    </title>
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/jquery.sidr.dark.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<main role="main">
    <div class="confirm">
        <h3>Êtes-vous sûr ?</h3>
        <button id="no">Non</button>
        <button id="yes">Oui</button>
    </div>

    <form name="edit-article" action="/editarticle" method="post">
        <label for="title">Titre</label><br>
        <input type="text" name="title" id="title" value="<?php echo($title); ?>"><br>

        <label for="content">Contenu</label><br>
        <textarea name="content" id="content"><?php echo($content); ?></textarea><br>

        <input type="hidden" name="id" value="<?php echo($id); ?>">

        <br>
        <input type="submit">
    </form>

    <br>
    <button id="delete">Supprimer l'article</button>
</main>

<?php include('footer.php') ?>
<script src="/assets/js/editarticle.js"></script>
</body>
</html>