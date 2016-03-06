<?php
$id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
$title = ArticleModel::getTitle($this->pdo, $id);
$date = ArticleModel::getDate($this->pdo, $id);
$author = ArticleModel::getAuthor($this->pdo, $id);
$content = ArticleModel::getContent($this->pdo, $id);
$edit_author = ArticleModel::getEditAuthor($this->pdo, $id);
$edit_date = ArticleModel::getEditDate($this->pdo, $id);
// TODO: Same with comments !
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | <?php echo($title); ?></title>
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<main role="main">
    <section class="container">
        <h1><?php echo($title); ?></h1>
        <p class="text"><?php echo($content); ?></p>
        <p class="author"><?php echo($author . '.'); ?></p>
        <p class="date"><?php echo('Le ' . $date . '.'); ?></p>

        <?php
        if ($edit_date !== $date) {
            echo('<br><p class="edit">Modifié le ' . $edit_author . ' par ' . $edit_date . '.</p>');
        }

        if ($author === $_SESSION['auth']['username']) {
            echo('<a href="/edit/'. $id .'">Éditer l\'article</a>');
        }
        ?>
    </section>

    <section class="comments-block">
        <form name="comment" action="/comment" method="post">
            <?php
                if (isset($_SESSION['auth'])) {
                    echo('
                        <label for="comment">Commenter</label><br>'
                        . '<textarea name="comment" id="comment" placeholder="Écrire un commentaire ..."></textarea><br>'
                        . '<input type="hidden" name="article" value="' . $id .'">'
                        . '<input type="submit">
                        ');
                } else {
                    echo('<p class="warning">Veuillez vous connecter pour pouvoir commenter.</p>');
                }
            ?>
        </form>

        <div class="show-comments">
            <?php
            if (CommentModel::noComment($this->pdo, $id)) {
                echo('<p>Aucun commentaire.</p>');
            } else {
                echo('<button id="show-more">En afficher plus</button>');
            }
            ?>
        </div>
    </section>
</main>

<?php include('footer.php') ?>
<script src="/assets/js/comment.js"></script>
</body>
</html>