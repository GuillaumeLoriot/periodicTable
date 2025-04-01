<?php

namespace App\Controller;

use App\Manager\ElementManager;
use App\Manager\StateManager;
use App\Manager\FamilyManager;
use App\Manager\AbundanceManager;
use App\Model\Element;

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
        //Récuperer les éléments, les familles, les états et les abondances dans la templates,
        require_once("./templates/homePages/index_element.php");
        dump($_POST);
    }

    // Route DetailElement -> URL: index.php?action=detail&id=
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






// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!      WORK IN PROGESS      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

     // Route search_element -> URL: index.php?action=homepage
     public function searchElement(int $name)
     {
         //Récuperer le ou les élément 
         $searchedElements = $this->elementManager->selectByName($name);
        //  récupère un tableau contenant un ou plusieurs élément en fonction du résultat de la requète ou false si pas de résultat
         if ($searchedElements != false) {
             //Afficher les éléments dans la template si le
             require_once("./templates/elements/index_element.php");
         } 
     }


    //  voir ou ranger cette fonction qui choisi les classe en fonction de si un élément est trouvé ou non et voir l'index_element pour débug
     public function getClass(Element $element, array $searchedElements):string
     {
        $classes = $element->getState()->getName()." ".$element->getFamily()->getName()." ".$element->getAbundance()->getName();
        if(!empty($_POST["search"])){
            $elementId = $element->getId();
            foreach ($searchedElements as $searchedElement) {
                $searchedElementId = $searchedElement->getId();
                if($searchedElementId === $elementId){
                    $classes = $searchedElement->getState()->getName()."Search ".$searchedElement->getFamily()->getName()."Search ".$searchedElement->getAbundance()->getName()."Search";
                }
            }
        }
        return $classes;
     }





}
