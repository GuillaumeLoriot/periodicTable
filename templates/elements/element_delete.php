<?php

$title = "Supprimer " . $element->getName();
require_once __DIR__ . '/../blocks/header.php';

?>

<h1>Confirmer la suppression de l'élément <?= $element->getName() ?>?</h1>

<form class="p-3" method="POST" action="index.php?action=delete_element&id=<?= $element->getId(); ?>">
    <!-- Redirection admin -->
    <input class="btn btn-outline-primary me-3" type="submit" value="Annuler" formaction="index.php?action=detail_element_admin&id=<?= $element->getId(); ?>">
    <!-- Redirection index -->
    <input class="btn btn-outline-danger" type="submit" value="Confirmer">
</form>

<?php
require_once __DIR__ . '/../blocks/footer.php';