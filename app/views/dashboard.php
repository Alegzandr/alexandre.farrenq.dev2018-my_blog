<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sup'Teaching.fr</title>
    <link rel="icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php include('header.php'); ?>

<main role="main">
    <h3>Dashboard</h3>

    <section id="users">
        <article>
            <h4>Utilisateurs</h4>
            <p>Gérez l'ensemble des utilisateurs.</p>
        </article>

        <button id="more-users">Afficher plus d'utilisateurs</button>
    </section>

    <section id="articles">
        <article>
            <h4>Articles</h4>
            <p>Gérez l'ensemble des articles.</p>
        </article>

        <button id="more-articles">Afficher plus d'articles</button>
    </section>

    <section id="comments">
        <article>
            <h4>Commentaires</h4>
            <p>Gérez l'ensemble des commentaires.</p>
        </article>

        <button id="more-articles">Afficher plus de commentaires</button>
    </section>
</main>

<?php include('footer.php'); ?>
<script src="assets/js/dashboard.js"></script>
</body>
</html>
