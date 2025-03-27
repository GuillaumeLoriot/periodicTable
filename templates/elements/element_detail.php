<?php
$title = $element->getName() . " profil";
require_once __DIR__ . '/../blocks/header.php';
?>

<h1 class="text-center">Détail de l'élément<?= $element->getName() ?></h1>
<div class="col-4 d-flex p-3 justify-content-center">
    <img src="images/<?= $element->getElementPicture() ?>" alt="<?= $element->getName() ?>" style="height: 200px; width: auto;">
    <h3>Modèle schématique</h3>
    <img src="images/<?= $element->getElementModel() ?>" alt="<?= $element->getName() ?>" style="height: 200px; width: auto;">
    <h2>--Elément--</h2>
    <div class="p-2">
        <p>Nom: <?= $element->getName() ?></p>
        <p>Numéro atomic: <?= $element->getAtomicNumber() ?></p>
        <p>Symbole chimique: <?= $element->getChemicalSymbol() ?></p>
        <p>Masse atomique: <?= $element->getAtomicMass() ?></p>
        <p>Group: <?= $element->getGroup() ?></p>
        <p>Période: <?= $element->getPeriod() ?></p>
        <p>Définition: <?= $element->getDefinition() ?></p>
        <p>Date de découverte: <?= $element->getDiscoveryDate() ?></p>
        <p>Etat: <?= $element->getMail() ?></p>
        <p>Famille: <?= $element->getMail() ?></p>
        <p>Abondance: <?= $element->getMail() ?></p>
    </div>
    <h2>--Famille--</h2>
    <div class="p-2">
        <p>Nom: <?= $family->getName() ?></p>
        <p>Description: <?= $family->getDescription() ?></p>
        <p>Est-ce un métal? <?php echo ($family->getMetal() ? "oui" : "non"); ?></p>

    </div>
    <h2>--Etat--</h2>
    <div class="p-2">
        <p>Nom: <?= $state->getName() ?></p>

    </div>
    <h2>--Abondance--</h2>
    <div class="p-2">
        <p>Nom: <?= $abundance->getName() ?></p>
        <p>Description: <?= $abundance->getDescription() ?></p>
    </div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-primary" href="index.php?action=edit_element&id=<?= $element->getId() ?>">Modifier</a>
        <a class="btn btn-danger" href="index.php?action=delete_element&id=<?= $element->getId() ?>">Supprimer</a>
    </div>
</div>
<?php
require_once __DIR__ . '/../blocks/footer.php';
