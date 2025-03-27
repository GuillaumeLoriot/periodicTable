<?php
$title = $user->getUsername() . " profil";
require_once __DIR__ . '/../blocks/header.php';
?>
<h1 class="text-primary">Modifier l'utilisateur <?= $user->getUsername() ?> ?</h1>

<img src="images/users<?= $user->getProfilPicture() ?>" alt="<?= $user->getUsername() ?>">


<form method="POST" action="index.php?action=edit_user&id=<?= ($user->getId()) ?>">

    <label for="username">Username</label>
    <input id="username" type="text" name="username" value="<?= ($user->getUsername())  ?>">
    <?php if (isset($errors['username'])): ?>
        <p class="text-danger"><?= $errors['username'] ?></p>
    <?php endif; ?>

    <label for="name">Nom</label>
    <input type="text" name="name" value="<?= $user->getName()  ?>">
    <?php if (isset($errors['name'])): ?>
        <p class="text-danger"><?= $errors['name'] ?></p>
    <?php endif; ?>

    <label for="firstName">Prénom</label>
    <input id="firstName" type="text" name="firstName" value="<?= $user->getFirstName()  ?>">
    <?php if (isset($errors['firstName'])): ?>
        <p class="text-danger"><?= $errors['firstName'] ?></p>
    <?php endif; ?>

    <label for="mail">Email</label>
    <input id="mail" type="email" name="mail">
    <?php if (isset($errors['mail'])): ?>
        <p class="text-danger"><?= $errors['mail'] ?></p>
    <?php endif; ?>

    <label for="password">Mot de passe</label>
    <input id="password" type="password" name="password">
    <?php if (isset($errors['password'])): ?>
        <p class="text-danger"><?= $errors['password'] ?></p>
    <?php endif; ?>

    <label for="profilPicture">Photo de profil</label>
    <input id="profilPicture" type="text" name="profilPicture">
    <?php if (isset($errors['profilPicture'])): ?>
        <p class="text-danger"><?= $errors['profilPicture'] ?></p>
    <?php endif; ?>

    <button class="btn btn-outline-success">Valider</button>

</form>
<?php
require_once __DIR__ . '/../blocks/footer.php';