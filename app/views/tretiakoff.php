<?php $user = 'Tretiakoff'; ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup'Teaching.fr | Profil de <?php echo($user); ?></title>
    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include('header.php'); ?>

<?php
if ($_SESSION['auth']['username'] === $user) {
    echo('<a href="/profile/edit" id="editp-btn">Éditer mon profil</a>');
}
?>

<p>
    Nom d'utilisateur :
    <?php echo('<span class="info">' . $user . '</span>'); ?>
</p>

<p>
    Prénom :
    <?php echo('<span class="info">' . ProfileModel::getFirstName($this->pdo, $user) . '</span>'); ?>
</p>

<p>
    Nom :
    <?php echo('<span class="info">' . ProfileModel::getLastName($this->pdo, $user) . '</span>'); ?>
</p>

<p>
    Adresse mail :
    <?php echo('<span class="info">' . ProfileModel::getMail($this->pdo, $user) . '</span>'); ?>
</p>

<p>
    Date d'inscription :
    <?php echo('<span class="info">' . date('d/m/Y', ProfileModel::getTimestamp($this->pdo, $user)) . '</span>'); ?>
</p>

<p>
    Groupe :
    <?php echo('<span class="info">' . ucwords(ProfileModel::getGroup($this->pdo, $user)) . '</span>'); ?>
</p>

<?php include('footer.php'); ?>

<script src="../assets/js/jquery-2.2.1.min.js"></script>
</body>
</html>
