<?php
$title = "Modifier élément";
require_once __DIR__ . '/../blocks/header.php';
?>

<form method="POST" action="index.php?action=edit_element&id=<?= $element->getId(); ?>">

    <span class="d-block p-2 text-bg-dark">

        <label for="name">Nom</label>
        <input type="text" name="name" value="<?= $element->getName() ?>">

        <?php if (isset($errors["name"])) { ?>
            <p class="text-danger">
                <?= $errors["name"] ?>
            </p>
        <?php } ?>

    </span>

    <span class="d-block p-2 text-bg-dark">

        <label for="atomicNumber">Numéro atomique</label>
        <input type="number" name="atomicNumber" value="<?= $element->getAtomicNumber() ?>">

        <?php if (isset($errors["atomicNumber"])) { ?>
            <p class="text-danger">
                <?= $errors["atomicNumber"] ?>
            </p>
        <?php } elseif (isset( $errors["existingAtomicNumber"])) { ?>
            <p class="text-danger">
                <?= $errors["existingAtomicNumber"] ?>
            </p>
        <?php }?>

    </span>

    <span class="d-block p-2 text-bg-dark">

        <label for="chemicalSymbol">Symbole chimique</label>
        <input type="text" name="chemicalSymbol" value="<?= $element->getChemicalSymbol() ?>">

        <?php if (isset($errors["chemicalSymbol"])) { ?>
            <p class="text-danger">
                <?= $errors["chemicalSymbol"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="atomicMass">Masse atomique</label>
        <input type="number" name="atomicMass" value="<?= $element->getAtomicMass() ?>">

        <?php if (isset($errors["atomicMass"])) { ?>
            <p class="text-danger">
                <?= $errors["atomicMass"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="group">Groupe</label>
        <input type="number" name="group" value="<?= $element->getGroup() ?>">

        <?php if (isset($errors["group"])) { ?>
            <p class="text-danger">
                <?= $errors["group"] ?>
            </p>
    </span>
<?php } ?>

<span class="d-block p-2 text-bg-dark">

    <label for="period">Période</label>
    <input type="number" name="period" value="<?= $element->getPeriod() ?>">

    <?php if (isset($errors["period"])) { ?>
        <p class="text-danger">
            <?= $errors["period"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="definition">définition</label>
    <input type="text" name="definition" value="<?= $element->getDefinition() ?>">

    <?php if (isset($errors["definition"])) { ?>
        <p class="text-danger">
            <?= $errors["definition"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="discoveryDate">Date de découverte</label>
    <input type="date" name="discoveryDate" value="<?= $element->getDiscoveryDateFormat() ?>">

    <?php if (isset($errors["discoveryDate"])) { ?>
        <p class="text-danger">
            <?= $errors["discoveryDate"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="elementPicture">Photo de l'élément</label>
    <input type="text" name="elementPicture" value="<?= $element->getElementPicture() ?>">

    <?php if (isset($errors["elementPicture"])) { ?>
        <p class="text-danger">
            <?= $errors["elementPicture"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="elementModel">Modèle shématique</label>
    <input type="text" name="elementModel" value="<?= $element->getElementModel() ?>">

    <?php if (isset($errors["elementModel"])) { ?>
        <p class="text-danger">
            <?= $errors["elementModel"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="stateId">Etat</label>
    <select name="stateId" id="stateId">
        <?php foreach ($states as $state): ?>
            <option value="<?= $state->getId(); ?>" <?php echo ($state->getId() == $element->getState()->getId() ? "selected" : ""); ?>><?= $state->getName(); ?></option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($errors["stateId"])) { ?>
        <p class="text-danger">
            <?= $errors["stateId"] ?>
        </p>
    <?php } elseif (isset($errors["state"])) { ?>
        <p class="text-danger">
            <?= $errors["state"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="familyId">Famille</label>
    <select name="familyId" id="familyId">
        <?php foreach ($families as $family): ?>
            <option value="<?= $family->getId(); ?>" <?php echo ($family->getId() == $element->getFamily()->getId() ? "selected" : ""); ?>><?= $family->getName(); ?></option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($errors["stateId"])) { ?>
        <p class="text-danger">
            <?= $errors["stateId"] ?>
        </p>
    <?php } elseif (isset($errors["family"])) { ?>
        <p class="text-danger">
            <?= $errors["family"] ?>
        </p>
    <?php } ?>
</span>

<span class="d-block p-2 text-bg-dark">

    <label for="abundanceId">Abondance</label>
    <select name="abundanceId" id="abundanceId">
        <?php foreach ($abundances as $abundance): ?>
            <option value="<?= $abundance->getId(); ?>" <?php echo ($abundance->getId() == $element->getAbundance()->getId() ? "selected" : ""); ?>><?= $abundance->getName(); ?></option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($errors["stateId"])) { ?>
        <p class="text-danger">
            <?= $errors["stateId"] ?>
        </p>
    <?php } elseif (isset($errors["abundance"])) { ?>
        <p class="text-danger">
            <?= $errors["abundance"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <button>Valider</button>
    <button formaction="index.php">Annuler</button>

</span>

</form>


<?php
require_once __DIR__ . '/../blocks/footer.php';
