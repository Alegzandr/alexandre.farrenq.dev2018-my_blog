<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Identification</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<form action="signin" method="post" name="signin">
    <h3>S'identifier</h3>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <input type="submit">
</form>

<?php include('footer.php') ?>

<script src="assets/js/jquery-2.2.0.min.js"></script>
</body>
</html>