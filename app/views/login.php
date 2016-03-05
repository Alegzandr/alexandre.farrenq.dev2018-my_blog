<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Identification</title>
    <link rel="icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php include('header.php'); ?>

<main role="main">
    <form action="/signin" method="post" name="signin">
        <h3>S'identifier</h3>
        <br>

        <input type="text" name="username" placeholder="Nom d'utilisateur" required autofocus><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Se souvenir de moi</label><br>

        <br>
        <input type="submit">
    </form>
</main>

<?php include('footer.php'); ?>

<script src="assets/js/login.js"></script>
</body>
</html>
