<?php
$id = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
$content = CommentModel::getContent($this->pdo, $id);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Éditer mon commentaire</title>
    <link rel="icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
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

    <form name="edit-comment" action="/changecomment" method="post">
        <label for="content">Contenu</label><br>
        <textarea name="content" id="content" cols="30" rows="10" autofocus><?php echo($content); ?></textarea>
        <input type="hidden" name="id" value="<?php echo($id); ?>">

        <br>
        <input type="submit">
    </form>

    <br>
    <button id="delete">Supprimer le commentaire</button>
</main>

<?php include('footer.php') ?>
<script src="/assets/js/editcomment.js"></script>
</body>
</html>