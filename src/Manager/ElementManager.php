<?php

namespace App\Manager;

use App\Model\Element;
use App\Model\Family;
use App\Model\State;
use App\Model\Abundance;
use DateTime;

class ElementManager extends DatabaseManager
{

    /**
     * Récupère toutes les lignes de la table Element
     * @return array Tableau d'instance Element.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $request = self::getConnexion()->prepare(
            "SELECT e.id, e.name, e.atomic_number, e.chemical_symbol, e.atomic_mass, e.`group`, e.period, e.definition, e.discovery_date, 
                e.element_picture, e.element_model, f.id family_id, f.name family_name, f.description family_description, f.`metal` family_metal, 
                s.id state_id, s.name state_name,a.id abundance_id, a.name abundance_name, a.description abundance_description
                    FROM `element` e 
                    INNER JOIN family f ON f.id = e.family_id
                    INNER JOIN state s ON s.id = e.state_id
                    INNER JOIN abundance a  ON a.id = e.abundance_id
                    ORDER BY e.atomic_number;"
        );

        $request->execute();

        $arrayElements = $request->fetchAll();
        //Créer un tableau qui contiendra les objets Element
        $elements = [];
        //Boucle sur le tableau $arrayElements pour créer les objets Element 
        // Chaque élément du tableau $arrayElements est un tableau associatif
        foreach ($arrayElements as $arrayElement) {
            // Istantiation d'un objet family, state abundance et discoveryDate pour chaque objet Element
            $discoveryDate = new DateTime($arrayElement["discovery_date"]);
            $family = new Family($arrayElement["family_id"], $arrayElement["family_name"], $arrayElement["family_description"], $arrayElement["family_metal"]);
            $state = new State($arrayElement["state_id"], $arrayElement["state_name"]);
            $abundance = new Abundance($arrayElement["abundance_id"], $arrayElement["abundance_name"], $arrayElement["abundance_description"]);

            //Istantiation d'un objet Elements, avec les données du tableau associatif  
            $elements[] = new Element(
                $arrayElement["id"],
                $arrayElement["name"],
                $arrayElement["atomic_number"],
                $arrayElement["chemical_symbol"],
                $arrayElement["atomic_mass"],
                $arrayElement["group"],
                $arrayElement["period"],
                $arrayElement["definition"],
                $discoveryDate,
                $arrayElement["element_picture"],
                $arrayElement["element_model"],
                $state,
                $family,
                $abundance

            );
        }
        return $elements;
    }


    /**
     * Récupère une ligne de la table Element par ID
     * @param  int $id
     * @return Element
     */
    public function selectByID(int $id): Element|false
    {
        $request = self::getConnexion()->prepare(
            "SELECT e.id, e.name, e.atomic_number, e.chemical_symbol, e.atomic_mass, e.`group`, e.period, e.definition, e.discovery_date, 
        e.element_picture, e.element_model, f.id family_id, f.name family_name, f.description family_description, f.`metal` family_metal, 
        s.id state_id, s.name state_name,a.id abundance_id, a.name abundance_name, a.description abundance_description
            FROM `element` e 
            INNER JOIN family f ON f.id = e.family_id
            INNER JOIN state s ON s.id = e.state_id
            INNER JOIN abundance a  ON a.id = e.abundance_id
            WHERE e.id = :id;"
        );
        $request->execute([
            ":id" => $id
        ]);
        $arrayElement = $request->fetch();

        //Si pas de résultat fetch()
        if (!$arrayElement) {

            return false;
        }
        // Istantiation d'un objet family, state abundance et discoveryDate pour inserer dans l'objet Element
        $discoveryDate = new DateTime($arrayElement["discovery_date"]);
        $family = new Family($arrayElement["family_id"], $arrayElement["family_name"], $arrayElement["family_description"], $arrayElement["family_metal"]);
        $state = new State($arrayElement["state_id"], $arrayElement["state_name"]);
        $abundance = new Abundance($arrayElement["abundance_id"], $arrayElement["abundance_name"], $arrayElement["abundance_description"]);
        //Renvoyer l'instance d'un objet Element avec les données du tableau associatif
        return new Element(
            $arrayElement["id"],
            $arrayElement["name"],
            $arrayElement["atomic_number"],
            $arrayElement["chemical_symbol"],
            $arrayElement["atomic_mass"],
            $arrayElement["group"],
            $arrayElement["period"],
            $arrayElement["definition"],
            $discoveryDate,
            $arrayElement["element_picture"],
            $arrayElement["element_model"],
            $state,
            $family,
            $abundance

        );
    }

    /**
     * insertElement
     *
     * @param  Element $Element
     * @return bool
     */

    public function insert(Element $element): bool
    {
        $request = self::getConnexion()->prepare("INSERT INTO `element`(`name`, `atomic_number`, `chemical_symbol`, `atomic_mass`, `group`, `period`, `definition`, `discovery_date`, `element_picture`, `element_model`, `state_id`, `family_id`, `abundance_id`) VALUES (:name, :atomic_number, :chemical_symbol, :atomic_mass, :group, :period, :definition, :discovery_date, :element_picture, :element_model, :state_id, :family_id, :abundance_id);");
        $request->execute([

            ":name" => $element->getName(),
            ":atomic_number" => $element->getAtomicNumber(),
            ":chemical_symbol" => $element->getChemicalSymbol(),
            ":atomic_mass" => $element->getAtomicMass(),
            ":group" => $element->getGroup(),
            ":period" => $element->getPeriod(),
            ":definition" => $element->getDefinition(),
            ":discovery_date" => $element->getDiscoveryDateFormat(),
            ":element_picture" => $element->getElementPicture(),
            "element_model" => $element->getElementModel(),
            ":state_id" => $element->getState()->getId(),
            ":family_id" => $element->getFamily()->getId(),
            ":abundance_id" => $element->getAbundance()->getId(),
        ]);
        return $request->rowCount() > 0;
    }

    /**
     * updateElementByID
     * Element $element, State $state, Family $family, Abundance $abundance
     * @param  Element $Element
     * @return bool
     */
    public function update(Element $element): bool
    {
        $request = self::getConnexion()->prepare("UPDATE `element` SET `name` = :name, `atomic_number` = :atomic_number,
        `chemical_symbol` = :chemical_symbol, `atomic_mass` = :atomic_mass, `group` = :group, `period` = :period, 
        `definition` = :definition, `discovery_date` = :discovery_date, `element_picture` = :element_picture, 
        `element_model` = :element_model, `state_id` = :state_id, `family_id` = :family_id, `abundance_id` = :abundance_id
        WHERE id = :id;");
        $request->execute([

            ":id" => $element->getId(),
            ":name" => $element->getName(),
            ":atomic_number" => $element->getAtomicNumber(),
            ":chemical_symbol" => $element->getChemicalSymbol(),
            ":atomic_mass" => $element->getAtomicMass(),
            ":group" => $element->getGroup(),
            ":period" => $element->getPeriod(),
            ":definition" => $element->getDefinition(),
            ":discovery_date" => $element->getDiscoveryDateFormat(),
            ":element_picture" => $element->getElementPicture(),
            "element_model" => $element->getElementModel(),
            ":state_id" => $element->getState()->getId(),
            ":family_id" => $element->getFamily()->getId(),
            ":abundance_id" => $element->getAbundance()->getId(),
        ]);
        return $request->rowCount() > 0;
    }

    /**
     * deleteElementByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteByID(int $id): bool
    {
        $request = self::getConnexion()->prepare("DELETE FROM `Element` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        return $request->rowCount() > 0;
    }
}
