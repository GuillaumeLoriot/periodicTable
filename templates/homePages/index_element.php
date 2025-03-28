<?php
$title = "Tableau périodique";
require_once __DIR__ . '/../blocks/header.php';
?>

<h1 class="text-center">Tableau périodique des éléments</h1>
<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($elements as $element): ?>
        <div class="col-4 d-flex p-3 justify-content-center">
            <a href="index.php?action=detail_element&id=<?= $element->getId() ?>"><img src="images/<?= $element->getElementPicture() ?>" alt="<?= $element->getName() ?>" style="height: 100px; width: auto;"></a>
            <div class="p-2">
                <h2><?= $element->getChemicalSymbol() ?></h2>
                <p><?= $element->getName() ?>, <?= $element->getAtomicNumber() ?></p>
                <div class="card-body">
                    <h5 class="card-title"><?= $element->getName() ?></h5>
                    <p class="card-text"><?= $element->getChemicalSymbol() ?> - <?= $element->getAtomicMass() ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php
    require_once __DIR__ . '/../blocks/footer.php';
