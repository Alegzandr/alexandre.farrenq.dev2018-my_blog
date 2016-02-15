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
    <br>

    <input type="text" name="username" placeholder="Nom d'utilisateur" ><br>
    <input type="password" name="password" placeholder="Mot de passe" ><br>

    <br>
    <input type="submit">
</form>

<?php include('footer.php') ?>

<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/login.js"></script>
</body>
</html>
