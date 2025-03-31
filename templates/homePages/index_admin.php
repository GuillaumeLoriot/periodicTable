<?php
$title = "Administration Tableau Periodique";
require_once __DIR__ . '/../blocks/header.php';
?>


<h1><?= $title ?></h1>

<form action="index.php?action=admin" method="POST" id="searchBar">
    <input type="text">
    <input type="submit" value="Search" id="searchButton">
</form>

<div id="button">
    <a id="addButton" href="index.php?action=add">Ajouter</a>
</div>


<ul id="periodicTable">
    <?php foreach ($elements as $element): ?>
        <li id="element<?= $element->getAtomicNumber(); ?>" class="<?= $element->getState()->getName(); ?> <?= $element->getFamily()->getName(); ?> <?= $element->getAbundance()->getName(); ?>">
            <a href="index.php?action=detail_element_admin&id=<?= $element->getId() ?>">
                <p><?= $element->getName(); ?></p>
                <h2><?= $element->getChemicalSymbol() ?></h2>
                <div>
                    <p class="atomiNumber"><?= $element->getAtomicNumber(); ?></p>
                    <p class="atomicMass"><?= $element->getAtomicMass(); ?></p>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<div>
    <h2 class="legendTitle">Familles</h2>
    <ul id="familyLegend">
        <li class="alcalinLegend">
            <h3>Alcalin</h3>
        </li>
        <li class="alcalino-terreuxLegend">
            <h3>Alcalino terreux</h3>
        </li>
        <li class="lanthanidesLegend">
            <h3>Lanthanides</h3>
        </li>
        <li class="actinidesLegend">
            <h3>Actinides</h3>
        </li>
        <li class="metal-de-transitionLegend">
            <h3>Métal de transition</h3>
        </li>
        <li class="metal-pauvreLegend">
            <h3>Métal pauvre</h3>
        </li>
        <li class="metalloïdeLegend">
            <h3>Métalloïde</h3>
        </li>
        <li class="autre-non-metalLegend">
            <h3>Autre non métal</h3>
        </li>
        <li class="halogeneLegend">
            <h3>Halogène</h3>
        </li>
        <li class="gaz-nobleLegend">
            <h3>Gaznoble</h3>
        </li>
        <li class="non-classeLegend">
            <h3>Non classé</h3>
        </li>
    </ul>
</div>
<div>
    <h2 class="legendTitle">Etats</h2>
    <ul id="stateLegend">
        <li class="solidLegend">
            <h3>Solide</h3>
        </li>
        <li class="liquidLegend">
            <h3>Liquide</h3>
        </li>
        <li class="gasLegend">
            <h3>Gaz</h3>
        </li>
    </ul>
</div>
<div>
    <h2 class="legendTitle">Abondances</h2>
    <ul id="abundanceLegend">
        <li class="primordialLegend">
            <h3>Primordial</h3>
        </li>
        <li class="residuelLegend">
            <h3>Résiduel</h3>
        </li>
        <li class="syntheticLegend">
            <h3>Synthétique</h3>
        </li>
    </ul>
</div>


<?php
require_once __DIR__ . '/../blocks/footer.php';
