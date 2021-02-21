<?php

include "BaseDeDonnee.php";

class MembreDAO{
    public static function validerConnexion($membre){
        $MESSAGE_SQL_VALIDER_CONNEXION = "SELECT * FROM `membres` WHERE prenom=:prenom AND password = :password;";

        $requeteValiderConnexion = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_VALIDER_CONNEXION);

        $requeteValiderConnexion->bindParam(':prenom', $membre["prenom"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':password', $membre["password"], PDO::PARAM_STR);

        $requeteValiderConnexion->execute();
        
        $membre = $requeteValiderConnexion->fetch();
        return $membre;
    }

    public static function enregistrerMembre($nouveauMembre)
    {
        $MESSAGE_SQL_INSCRIPTION = "INSERT INTO membres (prenom, nom, mail, password)
            VALUES (:prenom, :nom, :email, :password);";

        $requeteInscriptionMembre = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_INSCRIPTION);

        $requeteInscriptionMembre->bindParam(':prenom', $nouveauMembre["prenom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':nom', $nouveauMembre["nom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':mail', $nouveauMembre["mail"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':password', $nouveauMembre["password"], PDO::PARAM_STR);

        $reussiteInscription = $requeteInscriptionMembre->execute();
        return $reussiteInscription;
    }
}