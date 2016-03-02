<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Éditer mon profil</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include('header.php') ?>

<p>
    Nom d'utilisateur :
    <?php echo('<span class="info">' . $_SESSION['auth']['username']) . '</span>' ?>
</p>

<p>
    Prénom :
    <?php echo('<span class="info">' . $_SESSION['auth']['first_name']) . '</span>' ?>
</p>

<p>
    Nom :
    <?php echo('<span class="info">' . $_SESSION['auth']['last_name']) . '</span>' ?>
</p>

<p>
    Adresse mail :
    <?php echo('<span class="info">' . $_SESSION['auth']['mail']) . '</span>' ?>
</p>

<p>
    Date d'inscription :
    <?php echo('<span class="info">' . date('d/m/Y', $_SESSION['auth']['timestamp'])) . '</span>' ?>
</p>

<p>
    Groupe :
    <?php echo('<span class="info">' . ucwords($_SESSION['auth']['permissions'])) . '</span>' ?>
</p>

<?php include('footer.php') ?>

<script src="../assets/js/jquery-2.2.1.min.js"></script>
</body>
</html>