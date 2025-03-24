<?php

namespace App\Manager;


use App\Model\State;

class StateManager extends DatabaseManager{

    /**
     * Récupère toutes les lignes de la table State
     * @return array Tableau d'instance state.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $requete = self::getConnexion()->prepare("SELECT * FROM`state`;");
        $requete->execute();

        $arrayStates = $requete->fetchAll();
        //Créer un tableau qui contiendra les objets Car
        $states = [];
        //Boucle sur le tableau $arrayStates pour créer les objets State 
        // Chaque élément du tableau $arrayStates est un tableau associatif
        foreach ($arrayStates as $arrayState) {
            //Istantiation d'un objet States avec les données du tableau associatif  
            $states[] = new State($arrayState["id"], $arrayState["name"]);
        }
        return $states;
    }


     /**
     * Récupère une ligne de la table State par ID
     * @param  int $id
     * @return State
     */
    public function selectByID(int $id): State|false
    {
        $requete = self::getConnexion()->prepare("SELECT * FROM `state` WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        $arrayState = $requete->fetch();

        //Si pas de résultat fetch()
        if(!$arrayState) {

            return false;
        }
        //Renvoyer l'instance d'un objet State avec les données du tableau associatif
        return new State($arrayState["id"], $arrayState["name"]);
    }

     /**
     * insertState
     *
     * @param  State$state
     * @return bool
     */
    public function insert(State $state): bool
    {
        $requete = self::getConnexion()->prepare("INSERT INTO `state` (`name`) VALUES (:name);");

        $requete->execute([
            ":name" =>$state->getName(),
        ]);

        return $requete->rowCount() > 0;
    }

    /**
     * updateStateByID
     *
     * @param  State $state
     * @return bool
     */
    public function update(State $state): bool
    {
        $requete = self::getConnexion()->prepare("UPDATE `state` SET `name` = :name WHERE id = :id;");
        $requete->execute(
            [
                ":id" => $state->getId(),
                ":name" => $state->getName(),

            ]
        );

        return $requete->rowCount() > 0;
    }

        /**
     * deleteStateByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteByID(int $id): bool
    {
        $requete = self::getConnexion()->prepare("DELETE FROM `state` WHERE id = :id;");
        $requete->execute([
            ":id" => $id
        ]);

        return $requete->rowCount() > 0;
    }


}