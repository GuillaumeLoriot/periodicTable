<?php

namespace App\Controller;

use App\Manager\ElementManager;

class IndexController
{

    private ElementManager $elementManager;

    public function __construct()
    {
        // Quand on crée un IndexController
        // Il contiendra automatiquement un elementManager
        // Utilisable avec $this->elementManager
        $this->elementManager = new ElementManager();
    }

    // Route HomePage -> URL : index.php
    public function homePage()
    {
        //Récuperer les éléments
        $elements = $this->elementManager->selectAll();
        //Afficher les éléments dans la template
        require_once("./templates/homePages/index_element.php");
    }

    // Route DetailElement -> URL: index.php?action=detail&id=10 
    public function detailElement(int $id)
    {
        //Récuperer les elements
        $element = $this->elementManager->selectByID($id);
        if ($element != false) {
            //Afficher les éléments dans la template
            require_once("./templates/elements/element_detail.php");
        } else {
            $this->homePage();
        }
    }
}
