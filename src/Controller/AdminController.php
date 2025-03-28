<?php

namespace App\Controller;

use App\Manager\ElementManager;
use App\Manager\StateManager;
use App\Manager\FamilyManager;
use App\Manager\AbundanceManager;
use App\Model\Element;
use DateTime;

class AdminController
{

    private ElementManager $elementManager;

    public function __construct()
    {
        $this->elementManager = new ElementManager();
    }

    // Route DashboardAdmin ( ancien admin.php ) 
    // URL : index.php?action=admin
    public function dashboardAdmin()
    {
        //Récuperer les éléments
        $elements = $this->elementManager->selectAll();
        //Afficher les éléments dans la template
        require_once("./templates/homePages/index_admin.php");
    }

    // Route DetailElement -> URL: index.php?action=detail_admin&id=10 
    public function detailElementAdmin(int $id)
    {
        //Récuperer les elements
        $element = $this->elementManager->selectByID($id);
        if ($element != false) {
            //Afficher les éléments dans la template
            require_once("./templates/elements/element_detail_admin.php");
        } else {
            $this->dashboardAdmin();
        }
    }


    // Route DashboardAdmin ( ancien add.php ) 
    // URL : index.php?action=add
    public function addElement()
    {
        $errors = [];

        $stateManager = new StateManager();
        $familyManager = new FamilyManager();
        $abundanceManager = new AbundanceManager();

        $states = $stateManager->selectAll();
        $families = $familyManager->selectAll();
        $abundances = $abundanceManager->selectAll();

        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->validateElementForm($errors, $_POST);

            if (empty($errors)) {
                
                 // création avec les données du formulaire des différents objets nécéssaires à la création de l'objet élément 
                $discoveryDate = new DateTime($_POST["discoveryDate"]);
                $state = $stateManager->selectById($_POST["stateId"]);
                $family = $familyManager->selectById($_POST["familyId"]);
                $abundance = $abundanceManager->selectById($_POST["abundanceId"]);
                //Instancier un objet Element avec les données du formulaire et les objets créés juste avant
                $element = new Element(null, $_POST["name"], $_POST["atomicNumber"], $_POST["chemicalSymbol"], $_POST["atomicMass"], $_POST["group"], $_POST["period"], $_POST["definition"], $discoveryDate, $_POST["elementPicture"], $_POST["elementModel"], $state, $family, $abundance);

                // Ajouter la l'élément en BDD  et rediriger


                $this->elementManager->insert($element, $state, $family, $abundance);
                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/elements/element_add.php");
    }

    // Route EditElement ( ancien update.php ) 
    // URL : index.php?action=edit&id=1
    public function editElement(int $id)
    {
        $element = $this->elementManager->selectByID($id); 

        //Vérifier si l'élément avec l'ID existe en BDD
        if (!$element) {
            $this->dashboardAdmin();
        }

        $errors = [];

        $stateManager = new StateManager();
        $familyManager = new FamilyManager();
        $abundanceManager = new AbundanceManager();

        $states = $stateManager->selectAll();
        $families = $familyManager->selectAll();
        $abundances = $abundanceManager->selectAll();
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Vérifier les champs du formulaire
            $errors = $this->validateElementForm($errors, $_POST);
            // Si le formulaire n'a pas renvoyé d'erreurs
            if (empty($errors)) {

                // création avec les données du formulaire des différents objets nécéssaires à la création de l'objet élément
                $discoveryDate = new DateTime($_POST["discoveryDate"]);
                $state = $stateManager->selectById($_POST["stateId"]);
                $family = $familyManager->selectById($_POST["familyId"]);
                $abundance = $abundanceManager->selectById($_POST["abundanceId"]);
                // Mettre à jour l'élément $element et rediriger
                $element->setName($_POST["name"]);
                $element->setAtomicNumber($_POST["atomicNumber"]);
                $element->setChemicalSymbol($_POST["chemicalSymbol"]);
                $element->setAtomicMass($_POST["atomicMass"]);
                $element->setGroup($_POST["group"]);
                $element->setPeriod($_POST["period"]);
                $element->setDiscoveryDate($discoveryDate);
                $element->setElementPicture($_POST["elementPicture"]);
                $element->setElementModel($_POST["elementModel"]);
                $element->setState($state);
                $element->setFamily($family);
                $element->setAbundance($abundance);

                $this->elementManager->update($element);

                $this->detailElementAdmin($id);
                exit();
            }
        }
        require_once("./templates/elements/element_update.php");
    }
    // Route Delete ( ancien delete.php ) 
    // URL : index.php?action=delete&id=1
    public function deleteElement(int $id)
    {

        $element = $this->elementManager->selectByID($id);

        //Vérifier si l'élément avec l'ID existe en BDD
        if (!$element) {
            $this->dashboardAdmin();
            exit();
        }

        //Si le form est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Supprimer l'élément et rediriger
            $this->elementManager->deleteByID($element->getId());
            $this->dashboardAdmin();
            exit();
        }

        require_once("./templates/elements/element_delete.php");
    }


    public function validateElementForm(array $errors, array $elementForm): array
    {
        if (empty($elementForm["name"])) {
            $errors["name"] = "le nom de l'élément est manquant";
        }
        if (empty($elementForm["atomicNumber"])) {
            $errors["atomicNumber"] = "le numéro atomique de l'élément est manquant";
        }
        if (empty($elementForm["chemicalSymbol"])) {
            $errors["chemicalSymbol"] = "le symbole chimique de l'élément est manquant";
        }
        if (empty($elementForm["atomicMass"])) {
            $errors["atomicMass"] = "la masse atomique de l'élément est manquante";
        }
        if (empty($elementForm["group"])) {
            $errors["group"] = "le groupe de l'élément est manquant";
        }
        if (empty($elementForm["period"])) {
            $errors["period"] = "la période de l'élément est manquante";
        }
        if (empty($elementForm["definition"])) {
            $errors["definition"] = "la définition de l'élément est manquante";
        }
        if (empty($elementForm["discoveryDate"])) {
            $errors["discoveryDate"] = "la date de découverte de l'élément est manquante";
        }
        if (empty($elementForm["elementPicture"])) {
            $errors["elementPicture"] = "l'image de l'élément est manquante";
        }
        if (empty($elementForm["elementModel"])) {
            $errors["elementModel"] = "l'image du schéma de l'élément est manquante";
        }
        if (empty($elementForm["stateId"])) {
            $errors["stateId"] = "l'état l'élément est manquant";
        }
        if (empty($elementForm["familyId"])) {
            $errors["familyId"] = "la famille de l'élément est manquant";
        }
        if (empty($elementForm["abundanceId"])) {
            $errors["abundanceId"] = "l'abondance de l'élément est manquant";
        }


        return $errors;
    }
}
