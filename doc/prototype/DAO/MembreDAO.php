<?php
include CHEMIN_ACCESSEUR."BaseDeDonnee.php";

class MembreDAO{

    public static function validerConnexion($membre){
        $MESSAGE_SQL_VALIDER_CONNEXION = "SELECT * FROM `users` WHERE username=:username AND password = :password;";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_VALIDER_CONNEXION);

        $requete->bindParam(':username', $membre["username"], PDO::PARAM_STR);
        $requete->bindParam(':password', $membre["password"], PDO::PARAM_STR);

        $requete->execute();
        
        $reussitConnexion = $requete->fetch();
        return $reussitConnexion;
    }

    public static function enregistrerMembre($nouveauMembre)
    {
        $MESSAGE_SQL_INSCRIPTION = "INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password);";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_INSCRIPTION);

        $requete->bindParam(':username', $nouveauMembre["username"], PDO::PARAM_STR);
        $requete->bindParam(':email', $nouveauMembre["email"], PDO::PARAM_STR);
        $requete->bindParam(':password', $nouveauMembre["password"], PDO::PARAM_STR);

        $reussiteInscription = $requete->execute();
        return $reussiteInscription;
    }

}