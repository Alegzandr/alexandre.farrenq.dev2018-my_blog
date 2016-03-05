<?php
$id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
$title = ArticleModel::getTitle($this->pdo, $id);
$author = ArticleModel::getAuthor($this->pdo, $id);
$content = ArticleModel::getContent($this->pdo, $id);
// TODO: Same with comments !
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>
        Sup'Teaching.fr | Éditer
        <?php echo('"' . $title . '"'); ?>
    </title>
    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<main role="main">
    <section class="container">
        <h1><?php echo($title); ?></h1>
        <p class="text"><?php echo($content); ?></p>
        <p class="author"><?php echo($author); ?></p>
    </section>

    <section class="comments"></section>
</main>

<?php include('footer.php') ?>
</body>
</html>