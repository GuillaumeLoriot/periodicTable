<?php
$title = "Ajouter élément";
require_once __DIR__ . '/../blocks/header.php';
?>

<form method="POST" action="index.php?action=add">

    <span class="d-block p-2 text-bg-dark">

        <label for="name">Nom</label>
        <input type="text" name="name">

        <?php if (isset($errors["name"])) { ?>
            <p class="text-danger">
                <?= $errors["name"] ?>
            </p>
        <?php } ?>

    </span>

    <span class="d-block p-2 text-bg-dark">

        <label for="atomicNumber">Numéro atomique</label>
        <input type="number" name="atomicNumber" value="119">

        <?php if (isset($errors["atomicNumber"])) { ?>
            <p class="text-danger">
                <?= $errors["atomicNumber"] ?>
            </p>
        <?php } ?>

    </span>

    <span class="d-block p-2 text-bg-dark">

        <label for="chemicalSymbol">Symbole chimique</label>
        <input type="text" name="chemicalSymbol">

        <?php if (isset($errors["chemicalSymbol"])) { ?>
            <p class="text-danger">
                <?= $errors["chemicalSymbol"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="atomicMass">Masse atomique</label>
        <input type="number" name="atomicMass">

        <?php if (isset($errors["atomicMass"])) { ?>
            <p class="text-danger">
                <?= $errors["atomicMass"] ?>
            </p>
        <?php } ?>

    </span>
    <span class="d-block p-2 text-bg-dark">

        <label for="group">Groupe</label>
        <input type="number" name="group">

        <?php if (isset($errors["group"])) { ?>
            <p class="text-danger">
                <?= $errors["group"] ?>
            </p>
    </span>
<?php } ?>

<span class="d-block p-2 text-bg-dark">

    <label for="period">Période</label>
    <input type="number" name="period">

    <?php if (isset($errors["period"])) { ?>
        <p class="text-danger">
            <?= $errors["period"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="definition">définition</label>
    <input type="text" name="definition">

    <?php if (isset($errors["definition"])) { ?>
        <p class="text-danger">
            <?= $errors["definition"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="discoveryDate">Date de découverte</label>
    <input type="date" name="discoveryDate">

    <?php if (isset($errors["discoveryDate"])) { ?>
        <p class="text-danger">
            <?= $errors["discoveryDate"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="elementPicture">Photo de l'élément</label>
    <input type="text" name="elementPicture">

    <?php if (isset($errors["elementPicture"])) { ?>
        <p class="text-danger">
            <?= $errors["elementPicture"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="elementModel">Modèle shématique</label>
    <input type="text" name="elementModel">

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
            <option value="<?= $state->getId(); ?>"><?= $state->getName(); ?></option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($errors["stateId"])) { ?>
        <p class="text-danger">
            <?= $errors["stateId"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="familyId">Famille</label>
    <select name="familyId" id="familyId">
        <?php foreach ($families as $family): ?>
            <option value="<?= $family->getId(); ?>"><?= $family->getName(); ?></option>
        <?php endforeach; ?>
    </select>


    <?php if (isset($errors["familyId"])) { ?>
        <p class="text-danger">
            <?= $errors["familyId"] ?>
        </p>
    <?php } ?>

</span>

<span class="d-block p-2 text-bg-dark">

    <label for="abundanceId">Abondance</label>
    <select name="abundanceId" id="abundanceId">
        <?php foreach ($abundances as $abundance): ?>
            <option value="<?= $abundance->getId(); ?>"><?= $abundance->getName(); ?></option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($errors["abundanceId"])) { ?>
        <p class="text-danger">
            <?= $errors["abundanceId"] ?>
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
