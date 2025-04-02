<?php

namespace App\Controller;

use App\Manager\ElementManager;
use App\Manager\StateManager;
use App\Manager\FamilyManager;
use App\Manager\AbundanceManager;
use App\Model\Element;
use App\Controller\helpers\Helper;

class IndexController
{

    private ElementManager $elementManager;
    private FamilyManager $familyManager;
    private StateManager $stateManager;
    private AbundanceManager $abundanceManager;

    public function __construct()
    {
        // Quand on crée un IndexController
        // Il contiendra automatiquement un elementManager, familyManager, stateManager, et abundanceManager
        // Utilisable avec $this->elementManager, $this ..........
        $this->elementManager = new ElementManager();
        $this->familyManager = new FamilyManager();
        $this->stateManager = new StateManager();
        $this->abundanceManager = new AbundanceManager();

    }

    // Route HomePage -> URL : index.php
    public function homePage()
    {
        //Récuperer les éléments, les familles, les états et les abondances
        $elements = $this->elementManager->selectAll();
        $families = $this->familyManager->selectAll();
        $states = $this->stateManager->selectAll();
        $abundances = $this->abundanceManager->selectAll();
        $foundElementIds=[];
        if(!empty($_POST["search"])){          

            $foundElements = $this->elementManager->selectByName( $_POST["search"]);
            //  récupère un tableau de un ou plusieurs éléments ou false si pas de résultat
            if (!empty($foundElements)) {
                foreach ($foundElements as $foundElement) {
                    $foundElementIds[]= $foundElement->getId();
                }
            } 
        } 
        require_once("./templates/homePages/index_element.php");
    }


    // Route DetailElement -> URL: index.php?action=detail&id=
    public function detailElement(int $id)
    {
        $element = $this->elementManager->selectByID($id);
        if ($element != false) {
            //Afficher les éléments dans la template
            require_once("./templates/elements/element_detail.php");
        } else {
            $this->homePage();
        }

    }

}
