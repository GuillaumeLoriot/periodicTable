<?php

namespace App\Controller;

use App\Manager\ElementManager;
use App\Model\Element;

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
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = $this->validateElementForm($errors, $_POST);

            if (empty($errors)) {
                //Instancier une objet Element avec le sdonnées du formulaire
                $Element = new Element(null, $_POST["brand"], $_POST["model"], $_POST["horsePower"], $_POST["image"]);
                // Ajouter la voiture en BDD  et rediriger
                $ElementManager = new ElementManager();
                $ElementManager->insert($Element);
                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/Element_insert.php");
    }

    // Route EditElement ( ancien update.php ) 
    // URL : index.php?action=edit&id=1
    public function editElement(int $id)
    {
        $Element = $this->ElementManager->selectByID($id); // Un seul connect DB par page

        //Vérifier si la voiture avec l'ID existe en BDD
        if (!$Element) {
            $this->dashboardAdmin();
        }

        $errors = [];
        // Si le formulaire est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Vérifier les champs du formulaire
            $errors = $this->validateElementForm($errors, $_POST);
            // Si le formulaire n'a pas renvoyé d'erreurs
            if (empty($errors)) {

                // Mettre à jour la voiture $Element et rediriger
                $Element->setModel($_POST["model"]);
                $Element->setBrand($_POST["brand"]);
                $Element->setImage($_POST["image"]);
                $Element->setHorsePower($_POST["horsePower"]);

                $this->ElementManager->update($Element);

                $this->dashboardAdmin();
                exit();
            }
        }
        require_once("./templates/Element_update.php");
    }
    // Route Delete ( ancien delete.php ) 
    // URL : index.php?action=delete&id=1
    public function deleteElement(int $id)
    {
        $Element = $this->ElementManager->selectByID($id);

        //Vérifier si la voiture avec l'ID existe en BDD
        if (!$Element) {
            $this->dashboardAdmin();
            exit();
        }

        //Si le form est validé
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Supprimer la voiture et rediriger
            $this->ElementManager->deleteByID($Element->getId());
            $this->dashboardAdmin();
            exit();
        }

        require_once("./templates/Element_delete.php");
    }


    public function validateElementForm(array $errors, array $ElementForm): array
    {
        if (empty($ElementForm["model"])) {
            $errors["model"] = "le modele de voiture est manquant";
        }
        if (empty($ElementForm["brand"])) {
            $errors["brand"] = "la marque de la voiture est manquante";
        }
        if (empty($ElementForm["horsePower"])) {
            $errors["horsePower"] = "la puissance du vehicule est manquante";
        }
        if (empty($ElementForm["image"])) {
            $errors["image"] = "l'image de la voiture est manquante";
        }
        //Démo class ElementFormValidator

        return $errors;
    }
}
