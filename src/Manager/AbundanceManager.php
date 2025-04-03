<?php

namespace App\Manager;

use App\Model\Abundance;

class AbundanceManager extends DatabaseManager{

     /**
     * Récupère toutes les lignes de la table Abundance
     * @return array Tableau d'instance Abundance.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $request = self::getConnexion()->prepare("SELECT * FROM `Abundance`;");
        $request->execute();

        $arrayAbundances = $request->fetchAll();
        //Créer un tableau qui contiendra les objets Abundance
        $abundances = [];
        //Boucle sur le tableau $arrayAbundance pour créer les objets Abundance 
        // Chaque élément du tableau $arrayAbundance est un tableau associatif
        foreach ($arrayAbundances as $arrayAbundance) {
            //Istantiation d'un objet Abundances avec les données du tableau associatif  
            $abundances[] = new Abundance($arrayAbundance["id"], $arrayAbundance["name"], $arrayAbundance["description"]);
        }
        return $abundances;
    }


     /**
     * Récupère une ligne de la table Abundance par ID
     * @param  int $id
     * @return Abundance
     */
    public function selectById(int $id): Abundance|false
    {
        $request = self::getConnexion()->prepare("SELECT * FROM `Abundance` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        $arrayAbundance = $request->fetch();

        //Si pas de résultat fetch()
        if(!$arrayAbundance) {

            return false;
        }
        //Renvoyer l'instance d'un objet Abundance avec les données du tableau associatif
        return new Abundance($arrayAbundance["id"], $arrayAbundance["name"], $arrayAbundance["description"]);
    }

     /**
     * insertAbundance
     *
     * @param  Abundance $Abundance
     * @return bool
     */
    public function insert(Abundance $Abundance): bool
    {
        $request = self::getConnexion()->prepare("INSERT INTO `Abundance` (`name`, `description`) VALUES (:name, :description);");

        $request->execute([
            ":name" =>$Abundance->getName(),
            ":decription" =>$Abundance->getDescription(),
        ]);

        return $request->rowCount() > 0;
    }

    /**
     * updateAbundanceByID
     *
     * @param  Abundance $Abundance
     * @return bool
     */
    public function update(Abundance $Abundance): bool
    {
        $request = self::getConnexion()->prepare("UPDATE `Abundance` SET `name` = :name, `description` = :description WHERE id = :id;");
        $request->execute(
            [
                ":id" => $Abundance->getId(),
                ":name" => $Abundance->getName(),
                ":description" => $Abundance->getDescription(),

            ]
        );

        return $request->rowCount() > 0;
    }

        /**
     * deleteAbundanceByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteByID(int $id): bool
    {
        $request = self::getConnexion()->prepare("DELETE FROM `Abundance` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        return $request->rowCount() > 0;
    }
    
}