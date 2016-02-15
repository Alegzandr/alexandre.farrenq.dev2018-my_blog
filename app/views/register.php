<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Inscription</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<form action="signup" method="post" name="signup">
    <h3>S'inscrire</h3>
    <br>

    <input type="text" name="username" placeholder="Nom d'utilisateur" ><br>
    <input type="text" name="first-name" placeholder="Prénom" ><br>
    <input type="text" name="last-name" placeholder="Nom" ><br>
    <input type="email" name="mail" placeholder="Email" ><br>
    <input type="password" name="password" placeholder="Mot de passe" ><br>
    <input type="password" name="password2" placeholder="Vérification" ><br>

    <br>
    <input type="submit">
</form>

<?php include('footer.php') ?>

<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/register.js"></script>
</body>
</html>
