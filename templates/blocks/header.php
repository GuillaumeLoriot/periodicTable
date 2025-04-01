<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="styles.css">
    <title>
        <?= $title ?? "Tableau périodique" ?>
    </title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div id="homeButton">
                <a id="navbarHome" href="index.php?action=admin">Accueil</a>
            </div>
            <ul class="navbarNav">
                <?php

                // Vérification de la connexion utilisateur
                if (!isset($_SESSION["username"])) { ?>
                    <li class="navItem">
                        <a class="navLink" href="index.php?action=login">Connexion</a>
                    </li>
                <?php } else { ?>
                    <li class="navItem">
                        <a class="navLink" href="index.php?action=admin">Admin</a>
                    </li>
                    <li class="navItem">
                        <a class="navLink" href="index.php?action=logout">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>


        </nav>
    </header>