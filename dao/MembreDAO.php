<?php

include "BaseDeDonnees.php";

class MembreDAO{

    public static function enregistrerMembre($nouveauMembre)
    {
        $MESSAGE_SQL_INSCRIPTION = "INSERT INTO membre (prenom, nom, nom_utilisateur, courriel, mot_de_passe, confirmkey)
            VALUES (:prenom, :nom, :nom_utilisateur, :courriel, :mot_de_passe, :confirmkey);";

        $requeteInscriptionMembre = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_INSCRIPTION);

        $requeteInscriptionMembre->bindParam(':prenom', $nouveauMembre["prenom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':nom', $nouveauMembre["nom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':nom_utilisateur', $nouveauMembre["nom_utilisateur"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':courriel', $nouveauMembre["courriel"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':mot_de_passe', $nouveauMembre["mot_de_passe"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':confirmkey', $nouveauMembre["confirmkey"], PDO::PARAM_STR);

        $reussiteInscription = $requeteInscriptionMembre->execute();
        return $reussiteInscription;
    }

    public static function validerConnexion($connexionMembre)
    {
        $MESSAGE_SQL_VALIDER_CONNEXION = "SELECT * FROM membre WHERE courriel=:courriel;";

        $requeteValiderConnexion = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_VALIDER_CONNEXION);
        $requeteValiderConnexion->bindParam(':courriel', $connexionMembre["courriel"], PDO::PARAM_STR);
        //$requeteValiderConnexion->bindParam(':mot_de_passe', $connexionMembre["courriel"], PDO::PARAM_STR);
        $requeteValiderConnexion->execute();
        $membre = $requeteValiderConnexion->fetch();

        return $membre;
    }

    public static function lireMail($mail)
    {
        $MESSAGE_SQL_MAIL = "SELECT * FROM membre WHERE courriel=:mail";

        $requeteMail = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_MAIL);
        $requeteMail->bindParam(':mail', $mail, PDO::PARAM_STR);
        
        $requeteMail->execute();
        $membre = $requeteMail->fetch();

        return $membre;
    }

    public static function selectId($id, $confirmkey)
    {
        $MESSAGE_SQL_SELECT_ID = "SELECT * FROM membre WHERE id=:id AND confirmkey = :confirmkey;";

        $requete = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_SELECT_ID);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->bindParam('confirmkey', $confirmkey, PDO::PARAM_STR);

        $requete->execute();
        return $requete;
    }

    public static function updateConfirmation($id)
    {
        $MESSAGE_SQL_UPDATE = "UPDATE membre SET confirme = 1 WHERE id = :id;";

        $requeteUpdate = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_UPDATE);
        $requeteUpdate->bindParam(':id', $id, PDO::PARAM_INT);

        $requeteUpdate->execute();
        // $membre = $requeteUpdate;

        // return $membre;
    }
}