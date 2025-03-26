<?php
$title = "S'Enregistrer";
require_once __DIR__ . '/../blocks/header.php';
?>

<form method="POST" action="index.php?action=register">

    <span class="d-block p-2 text-bg-dark">

        <label for="username">Username</label>
        <input type="text" name="username">

        <?php if (isset($errors["username"])) { ?>
            <p class="text-danger">
                <?= $errors["username"] ?>
            </p>
        <?php } ?>

    </span>

    <span class="d-block p-2 text-bg-dark">

        <label for="password">Mot de passe</label>
        <input type="password" name="password">

        <?php if (isset($errors["password"])) { ?>
            <p class="text-danger">
                <?= $errors["password"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="name">Nom</label>
        <input type="text" name="name">

        <?php if (isset($errors["name"])) { ?>
            <p class="text-danger">
                <?= $errors["name"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="firstName">Prénom</label>
        <input type="text" name="firstName">

        <?php if (isset($errors["firstName"])) { ?>
            <p class="text-danger">
                <?= $errors["firstName"] ?>
            </p>
        <?php } ?>

        <span class="d-block p-2 text-bg-dark">

        <label for="mail">Email</label>
        <input type="email" name="mail">

        <?php if (isset($errors["name"])) { ?>
            <p class="text-danger">
                <?= $errors["name"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="profilPicture">Photo de profil</label>
        <input type="text" name="profilPicture">

        <?php if (isset($errors["profilPicture"])) { ?>
            <p class="text-danger">
                <?= $errors["profilPicture"] ?>
            </p>
        <?php } ?>

</span>

    <span class="d-block p-2 text-bg-dark">

        <button>Valider</button>
        <button formaction="index.php">Annuler</button>

    </span>

</form>

<a href="login.php">Se connecter</a>

<?php
require_once __DIR__ . '/../blocks/footer.php';


