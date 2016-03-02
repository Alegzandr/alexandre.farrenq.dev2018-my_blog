<?php

class SignupController extends BaseController
{
    public function indexAction()
    {
        header('content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');


        $valid = true;
        $errors = [];

        $username = ucwords(strtolower(htmlentities($_POST['username'])));
        $first_name = ucwords(strtolower(htmlentities($_POST['first-name'])));
        $last_name = ucwords(strtolower(htmlentities($_POST['last-name'])));
        $mail = htmlentities(strtolower($_POST['mail']));
        $password = htmlentities($_POST['password']);
        $password2 = htmlentities($_POST['password2']);

        if (!isset($username) || empty($username)) {
            $errors['username'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($username) < 6) {
            $errors['username'] = '<span class="errors">6 caractères min</span>';
            $valid = false;
        } elseif (strlen($username) > 24) {
            $errors['username'] = '<span class="errors">24 caractères max</span>';
            $valid = false;
        }

        if (!isset($first_name) || empty($first_name)) {
            $errors['firstName'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($first_name) < 2) {
            $errors['firstName'] = '<span class="errors">2 caractères min</span>';
            $valid = false;
        } elseif (strlen($first_name) > 32) {
            $errors['firstName'] = '<span class="errors">32 caractères max</span>';
            $valid = false;
        }

        if (!isset($last_name) || empty($last_name)) {
            $errors['lastName'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($last_name) < 2) {
            $errors['lastName'] = '<span class="errors">2 caractères min</span>';
            $valid = false;
        } elseif (strlen($last_name) > 32) {
            $errors['lastName'] = '<span class="errors">32 caractères max</span>';
            $valid = false;
        }

        if (!isset($mail) || empty($mail)) {
            $errors['mail'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = '<span class="errors">Format incorrect</span>';
            $valid = false;
        }

        if (!isset($password) || empty($password)) {
            $errors['password'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif (strlen($password) < 8) {
            $errors['password'] = '<span class="errors">8 caractères min</span>';
            $valid = false;
        }

        if (!isset($password2) || empty($password2)) {
            $errors['password2'] = '<span class="errors">Non saisi</span>';
            $valid = false;
        } elseif ($password2 !== $password) {
            $errors['password2'] = '<span class="errors">Non identiques</span>';
            $valid = false;
        }

        $errors['valid'] = $valid;

        if ($valid) {
            $timestamp = time();
            $hash = hash('sha256', strrev($timestamp) . $password . '\Rand0msalT/');

            $errors['create'] = SignupModel::create(
                $this->pdo,
                $username,
                $first_name,
                $last_name,
                $mail,
                $hash,
                $timestamp
            );

            // Check your permissions on the controllers directory to allow this to workn chown for php or chmod 777
            if (empty($errors['create'])) {
                // Creates controller for this new profile
                $file = '../app/controllers/ProfileController.php';
                $current = substr(file_get_contents($file), 0, -1);
                file_put_contents(
                    $file,
                    $current . '
    public function ' . strtolower($username) . 'Action()
    {
        include(\'../app/views/' . strtolower($username) . '.php\');
        return;
    }
}'
                );

                // Creates new view for this profile
                $file = '../app/views/' . strtolower($username) . '.php';
                file_put_contents(
                    $file,
'<?php $user = \'' . $username . '\'; ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sup\'Teaching.fr | Profil de <?php echo($user); ?></title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<?php include(\'header.php\'); ?>

<?php
    if ($_SESSION[\'auth\'][\'username\'] === $user) {
        echo(\'<a href="/profile/edit" id="editp-btn">Éditer mon profil</a>\');
    }
?>

<p>
    Nom d\'utilisateur :
    <?php echo(\'<span class="info">\' . $user . \'</span>\'); ?>
</p>

<p>
    Prénom :
    <?php echo(\'<span class="info">\' . ProfileModel::getFirstName($this->pdo, $user) . \'</span>\'); ?>
</p>

<p>
    Nom :
    <?php echo(\'<span class="info">\' . ProfileModel::getLastName($this->pdo, $user) . \'</span>\'); ?>
</p>

<p>
    Adresse mail :
    <?php echo(\'<span class="info">\' . ProfileModel::getMail($this->pdo, $user) . \'</span>\'); ?>
</p>

<p>
    Date d\'inscription :
    <?php echo(\'<span class="info">\' . date(\'d/m/Y\', ProfileModel::getTimestamp($this->pdo, $user)) . \'</span>\'); ?>
</p>

<p>
    Groupe :
    <?php echo(\'<span class="info">\' . ucwords(ProfileModel::getGroup($this->pdo, $user)) . \'</span>\'); ?>
</p>

<?php include(\'footer.php\'); ?>

<script src="../assets/js/jquery-2.2.1.min.js"></script>
</body>
</html>'
                );

                chmod($file, 0777);
            }
        }

        echo(json_encode($errors));
    }
}
