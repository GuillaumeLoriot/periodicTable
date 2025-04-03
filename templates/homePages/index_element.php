<?php
$title = "Tableau Periodique";
require_once __DIR__ . '/../blocks/header.php';
?>


<h1><?= $title ?></h1>

<form action="index.php?action=homePage" method="POST" id="searchBar">
    <input type="text" name="search">
    <input type="submit" value="search" id="searchButton" >
</form>

<ul id="periodicTable">
    <?php foreach ($elements as $element): ?>
        <li id="element<?= $element->getAtomicNumber(); ?>" class="<?= in_array($element->getId(), $foundElementIds) ?$element->getState()->getName()."Search ". $element->getFamily()->getName()."Search ".$element->getAbundance()->getName()."Search" : $element->getState()->getName()." ". $element->getFamily()->getName()." ".$element->getAbundance()->getName(); ?>">
            <a href="index.php?action=detail_element&id=<?= $element->getId() ?>">
                <p><?= $element->getName(); ?></p>
                <h2><?= $element->getChemicalSymbol() ?></h2>
                <div>
                    <p class="atomicNumber"><?= $element->getAtomicNumber(); ?></p>
                    <p class="atomicMass"><?= $element->getAtomicMass(); ?></p>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<h2>Légende</h2>
<div>
    <h3 class="legendTitle">Familles</h3>
    <ul id="familyLegend">
        <?php foreach ($families as $family): ?>
            <li class="<?= $family->getName(); ?>Legend">
                <h3><?= $family->getName(); ?></h3>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <h3 class="legendTitle">Etats</h3>
    <ul id="stateLegend">
        <?php foreach ($states as $state): ?>
            <li class="<?= $state->getName(); ?>Legend">
                <h3><?= $state->getName(); ?></h3>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <h3 class="legendTitle">Abondances</h3>
    <ul id="abundanceLegend">
        <?php foreach ($abundances as $abundance): ?>
            <li class="<?= $abundance->getName(); ?>Legend">
                <h3><?= $abundance->getName(); ?></h3>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php
require_once __DIR__ . '/../blocks/footer.php';
