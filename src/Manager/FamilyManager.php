<?php

namespace App\Manager;

use App\Model\Family;

class FamilyManager extends DatabaseManager{

         /**
     * Récupère toutes les lignes de la table Family
     * @return array Tableau d'instance Family.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $request = self::getConnexion()->prepare("SELECT * FROM `Family`;");
        $request->execute();

        $arrayFamilies = $request->fetchAll();
        //Créer un tableau qui contiendra les objets Family
        $families = [];
        //Boucle sur le tableau $arrayFamily pour créer les objets Family 
        // Chaque élément du tableau $arrayFamily est un tableau associatif
        foreach ($arrayFamilies as $arrayFamily) {
            //Istantiation d'un objet Families avec les données du tableau associatif  
            $families[] = new Family($arrayFamily["id"], $arrayFamily["name"], $arrayFamily["description"], $arrayFamily["metal"]);
        }
        return $families;
    }


     /**
     * Récupère une ligne de la table Family par ID
     * @param  int $id
     * @return Family
     */
    public function selectById(int $id): Family|false
    {
        $request = self::getConnexion()->prepare("SELECT * FROM `Family` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        $arrayFamily = $request->fetch();

        //Si pas de résultat fetch()
        if(!$arrayFamily) {

            return false;
        }
        //Renvoyer l'instance d'un objet Family avec les données du tableau associatif
        return new Family($arrayFamily["id"], $arrayFamily["name"], $arrayFamily["description"], $arrayFamily["metal"]);
    }

     /**
     * insertFamily
     *
     * @param  Family $Family
     * @return bool
     */
    public function insert(Family $Family): bool
    {
        $request = self::getConnexion()->prepare("INSERT INTO `Family` (`name`, `description`, `metal`) VALUES (:name, :description, :metal);");

        $request->execute([
            ":name" =>$Family->getName(),
            ":decription" =>$Family->getDescription(),
            ":metal" =>$Family->getMetal(),
        ]);

        return $request->rowCount() > 0;
    }

    /**
     * updateFamilyByID
     *
     * @param  Family $Family
     * @return bool
     */
    public function update(Family $Family): bool
    {
        $request = self::getConnexion()->prepare("UPDATE `Family` SET `name` = :name, `description` = :description, `metal` = :metal WHERE id = :id;");
        $request->execute(
            [
                ":id" => $Family->getId(),
                ":name" => $Family->getName(),
                ":description" => $Family->getDescription(),
                ":metal" =>$Family->getMetal(),

            ]
        );

        return $request->rowCount() > 0;
    }

        /**
     * deleteFamilyByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        $request = self::getConnexion()->prepare("DELETE FROM `Family` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        return $request->rowCount() > 0;
    }
    
}