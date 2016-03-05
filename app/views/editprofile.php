<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Éditer mon profil</title>
    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<main role="main">
    <form name="edit-profile" action="/editprofile" method="post">
        <label for="username">Nom d'utilisateur</label><br>
        <input type="text" name="username" id="username" value="<?php echo($_SESSION['auth']['username']); ?>"><br>

        <label for="first-name">Prénom</label><br>
        <input type="text" name="first-name" id="first-name" value="<?php echo($_SESSION['auth']['first_name']); ?>"><br>

        <label for="last-name">Nom de famille</label><br>
        <input type="text" name="last-name" id="last-name" value="<?php echo($_SESSION['auth']['last_name']); ?>"><br>

        <label for="mail">Adresse mail</label><br>
        <input type="email" name="mail" id="mail" value="<?php echo($_SESSION['auth']['mail']); ?>"><br>

        <label for="password">Mot de passe</label><br>
        <input type="password" name="password" id="password" placeholder="********"><br>

        <label for="password2">Confirmation</label><br>
        <input type="password" name="password2" id="password2" placeholder="********"><br>

        <br>
        <input type="submit">
    </form>
</main>

<?php include('footer.php') ?>
<script src="../assets/js/editprofile.js"></script>
</body>
</html>