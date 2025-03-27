<?php
$title = $user->getUsername() . " profil";
require_once __DIR__ . '/../blocks/header.php';
?>

<h1 class="text-center"><?= $user->getUsername() ?></h1>
<div class="col-4 d-flex p-3 justify-content-center">
    <img src="images/users<?= $user->getProfilPicture() ?>" alt="<?= $user->getUsername() ?>" style="height: 200px; width: auto;">
    <div class="p-2">
        <h2><?= $user->getUsername() ?></h2>
        <p>Prénom: <?= $user->getFirstName() ?></p>
        <p>Nom: <?= $user->getName() ?></p>
        <p>Email: <?= $user->getMail() ?></p>
    </div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-primary" href="index.php?action=edit_user&id=<?= $user->getId() ?>">Modifier</a>
        <a class="btn btn-danger" href="index.php?action=delete_user&id=<?= $user->getId() ?>">Supprimer</a>
    </div>
</div>
<?php
require_once __DIR__ . '/../blocks/footer.php';
