<?php
$title = $element->getName() . " détail";
require_once __DIR__ . '/../blocks/header.php';
?>

<h1 class="text-center">Détail de l'élément <?= $element->getName() ?></h1>
<div id="detailCard">
    <div class="card">
        <div id="elementImage">
            <h2>--Elément--</h2>
            <img src="images/<?= $element->getElementPicture() ?>" alt="<?= $element->getName() ?>" style="height: 200px; width: auto;">          
        </div>
        <div id="elementInfo">
            <div id="elementText">
                <p><span>Nom:  </span><?= $element->getName() ?></p>
                <p><span>Numéro atomic:  </span><?= $element->getAtomicNumber() ?></p>
                <p><span>Symbole chimique:  </span><?= $element->getChemicalSymbol() ?></p>
                <p><span>Masse atomique:  </span><?= $element->getAtomicMass() ?></p>
                <p><span>Group:  </span><?= $element->getGroup() ?></p>
                <p><span>Période:  </span><?= $element->getPeriod() ?></p>
                <p><span>Définition:  </span><?= $element->getDefinition() ?></p>
                <p><span>Date de découverte:  </span><?= $element->getDiscoveryDateFormat() ?></p>
                <p><span>Etat:  </span><?= $element->getState()->getName() ?></p>
                <p><span>Famille:  </span><?= $element->getFamily()->getName() ?></p>
                <p><span>Abondance:  </span><?= $element->getabundance()->getName() ?></p>
            </div>
            <div id="modelImage">
                <img src="images/atomes/<?= $element->getElementModel() ?>" alt="<?= $element->getName() ?>" style="height: 350px; width: auto;">
            </div>
        </div>
    </div>
    <div id="sfaCard">
        <div class="card">
            <h2>--Famille--</h2>
            <div>
                <p><span>Nom:  </span> <?= $element->getFamily()->getName() ?></p>
                <p><span>Description:  </span><?= $element->getFamily()->getDescription() ?></p>
                <p><span>Est-ce un métal?  </span><?php echo ($element->getFamily()->getMetal() ? "oui" : "non"); ?></p>
            </div>
        </div>
        <div class="card">
            <h2>--Etat--</h2>
            <div>
                <p><span>Nom:  </span> <?= $element->getState()->getName() ?></p>
            </div>
        </div>
        <div class="card">
            <h2>--Abondance--</h2>
            <div>
                <p><span>Nom:  </span> <?= $element->getAbundance()->getName() ?></p>
                <p><span>Description:  </span> <?= $element->getAbundance()->getDescription() ?></p>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/../blocks/footer.php';
