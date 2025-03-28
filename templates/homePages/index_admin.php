<?php
$title = "Administration Tableau Periodique";
require_once __DIR__ . '/../blocks/header.php';
?>

<div class="container mt-4">
    <h1 class="text-center mb-4"><?= $title ?></h1>

    <div class="m-5">
        <a class="btn btn-success" href="index.php?action=add">Ajouter un element</a>
    </div>

    <div class="d-flex flex-wrap justify-content-evenly gap-4">
        <?php foreach ($elements as $element): ?>
            <div class="col-md-4 mb-4 col-sm-6">
                <div class="card shadow-sm">
                <a href="index.php?action=detail_element_admin&id=<?= $element->getId() ?>"><img src="images/<?= $element->getElementPicture() ?>" alt="<?= $element->getName() ?>" style="height: 150px; width: auto;"></a>           
                    <div class="card-body">
                        <h5 class="card-title"><?= $element->getName() ?></h5>
                        <p class="card-text"><?= $element->getChemicalSymbol() ?> - <?= $element->getAtomicMass() ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../blocks/footer.php';