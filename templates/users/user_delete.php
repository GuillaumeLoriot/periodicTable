<?php

$title = "Supprimer " . $user->getUsername();
require_once __DIR__ . '/../blocks/header.php';

?>

<h1>Confirmer la suppression de l'utilisateur<?= $user->getUsername() ?>?</h1>

<form class="p-3" method="POST" action="index.php?action=delete_user&id=<?= $user->getId(); ?>">
    <!-- Redirection admin -->
    <input class="btn btn-outline-primary me-3" type="submit" value="Annuler" formaction="index.php?action=user_profil">
    <!-- Redirection index -->
    <input class="btn btn-outline-danger" type="submit" value="Confirmer">
</form>

<?php
require_once __DIR__ . '/../blocks/footer.php';