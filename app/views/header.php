<header id="top">
    <h1><a href="/">Sup'Teaching.fr</a></h1>

    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <?php
            if (!isset($_SESSION['auth'])) {
                echo('
                        <li><a href="/register">S\'enregistrer</a></li>
                        <li><a href="/login">Se connecter</a></li>
                        ');
            } else {
                $group = $_SESSION['auth']['permissions'];

                echo('<li><a href="/profile/'
                    . strtolower($_SESSION['auth']['username'])
                    . '">Mon profil</a></li>');
                if ($group === 'superadmin') {
                    echo('
                        <li><a href="/dashboard">Dashboard</a></li>
                        ');
                }
                if ($group != 'user') {
                    echo('
                        <li><a href="/new">Créer un article</a></li>
                        ');
                }
                echo('<li><a href="/logout">Se déconnecter</a></li>');
            }
            ?>
        </ul>
    </nav>
</header>
