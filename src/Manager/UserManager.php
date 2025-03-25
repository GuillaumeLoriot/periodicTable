<?php

namespace App\Manager;

use App\Model\User;

class UserManager extends DatabaseManager{

     /**
     * Récupère toutes les lignes de la table User
     * @return array Tableau d'instance User.
     */
    public function selectAll(): array
    {
        //Récupération de la connexion PDO et requête SQL
        $request = self::getConnexion()->prepare("SELECT * FROM `User`;");
        $request->execute();

        $arrayUsers = $request->fetchAll();
        //Créer un tableau qui contiendra les objets User
        $users = [];
        //Boucle sur le tableau $arrayUser pour créer les objets User 
        // Chaque élément du tableau $arrayUser est un tableau associatif
        foreach ($arrayUsers as $arrayUser) {
            //Istantiation d'un objet Users avec les données du tableau associatif  
            $users[] = new User($arrayUser["id"], $arrayUser["username"], $arrayUser["name"], $arrayUser["firstName"],$arrayUser["mail"],$arrayUser["password"],$arrayUser["profilPicture"]);
        }
        return $users;
    }


     /**
     * Récupère une ligne de la table User par ID
     * @param  int $id
     * @return User
     */
    public function selectById(int $id): User|false
    {
        $request = self::getConnexion()->prepare("SELECT * FROM `user` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        $arrayUser = $request->fetch();

        //Si pas de résultat fetch()
        if(!$arrayUser) {

            return false;
        }
        //Renvoyer l'instance d'un objet User avec les données du tableau associatif
        return new User($arrayUser["id"], $arrayUser["username"], $arrayUser["name"], $arrayUser["first_name"],$arrayUser["mail"],$arrayUser["password"],$arrayUser["profil_picture"]);

    }

     /**
     * insertUser
     *
     * @param  User $user
     * @return bool
     */
    public function insert(User $user): bool
    {
        $request = self::getConnexion()->prepare("INSERT INTO `user` (`username`, `name`, `first_name`, `mail`, `password`, `profil_picture`) VALUES (:username, :name, :first_name, :mail, :password, :profil_picture);");

        $request->execute([
            ":username" =>$user->getUsername(),
            ":name" =>$user->getName(),
            ":first_name" =>$user->getFirstName(),
            ":mail" =>$user->getMail(),
            ":password" =>$user->getPassword(),
            ":profil_picture" =>$user->getProfilPicture(),
        ]);

        return $request->rowCount() > 0;
    }

    /**
     * updateUserByID
     *
     * @param  User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        $request = self::getConnexion()->prepare("UPDATE `user` SET `username` = :username, `name` = :name, `first_name` = :first_name, `mail` = :mail, `password` = :password, `profil_picture` = :profil_picture WHERE id = :id;");
        $request->execute(
            [
            ":id" => $user,    
            ":username" =>$user->getUsername(),
            ":name" =>$user->getName(),
            ":first_name" =>$user->getFirstName(),
            ":mail" =>$user->getMail(),
            ":password" =>$user->getPassword(),
            ":profil_picture" =>$user->getProfilPicture(),
            ]
        );

        return $request->rowCount() > 0;
    }

        /**
     * deleteUserByID
     *
     * @param  int $id
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        $request = self::getConnexion()->prepare("DELETE FROM `user` WHERE id = :id;");
        $request->execute([
            ":id" => $id
        ]);

        return $request->rowCount() > 0;
    }

}