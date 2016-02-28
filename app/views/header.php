<header>
    <h1><a href="/">Sup'Teaching.fr</a></h1>

    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <?php
                if(!isset($_SESSION['auth'])) {
                    echo('
                        <li><a href="/register">S\'enregistrer</a></li>
                        <li><a href="/login">Se connecter</a></li>
                        ');
                } else {
                    echo('
                        <li><a href="/profile">Mon profil</a></li>
                        <li><a href="/logout">Se déconnecter</a></li>
                        ');
                }
            ?>
        </ul>
    </nav>
</header>
