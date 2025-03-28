<?php
dump($element);
$title = $element->getName() . " détail";
require_once __DIR__ . '/../blocks/header.php';
?>

<h1 class="text-center">Détail de l'élément <?= $element->getName() ?></h1>
<div>
    <img src="images/<?= $element->getElementPicture() ?>" alt="<?= $element->getName() ?>" style="height: 200px; width: auto;">
    <h3>Modèle schématique</h3>
    <img src="images/atomes/<?= $element->getElementModel() ?>" alt="<?= $element->getName() ?>" style="height: 200px; width: auto;">
    <h2>--Elément--</h2>
    <div>
        <p>Nom: <?= $element->getName() ?></p>
        <p>Numéro atomic: <?= $element->getAtomicNumber() ?></p>
        <p>Symbole chimique: <?= $element->getChemicalSymbol() ?></p>
        <p>Masse atomique: <?= $element->getAtomicMass() ?></p>
        <p>Group: <?= $element->getGroup() ?></p>
        <p>Période: <?= $element->getPeriod() ?></p>
        <p>Définition: <?= $element->getDefinition() ?></p>
        <p>Date de découverte: <?= $element->getDiscoveryDateFormat() ?></p>
        <p>Etat: <?= $element->getState()->getName() ?></p>
        <p>Famille: <?= $element->getFamily()->getName() ?></p>
        <p>Abondance: <?= $element->getabundance()->getName() ?></p>
    </div>
    <h2>--Famille--</h2>
    <div>
        <p>Nom: <?= $element->getFamily()->getName() ?></p>
        <p>Description: <?= $element->getFamily()->getDescription() ?></p>
        <p>Est-ce un métal? <?php echo ($element->getFamily()->getMetal() ? "oui" : "non"); ?></p>

    </div>
    <h2>--Etat--</h2>
    <div>
        <p>Nom: <?= $element->getState()->getName() ?></p>

    </div>
    <h2>--Abondance--</h2>
    <div>
        <p>Nom: <?= $element->getAbundance()->getName() ?></p>
        <p>Description: <?= $element->getAbundance()->getDescription() ?></p>
    </div>
</div>
<?php
require_once __DIR__ . '/../blocks/footer.php';