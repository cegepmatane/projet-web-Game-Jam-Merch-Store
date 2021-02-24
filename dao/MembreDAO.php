<?php

include "BaseDeDonnees.php";

class MembreDAO{

    public static function enregistrerMembre($nouveauMembre)
    {
        $MESSAGE_SQL_INSCRIPTION = "INSERT INTO membre (prenom, nom, nom_utilisateur, courriel, mot_de_passe)
            VALUES (:prenom, :nom, :nom_utilisateur, :courriel, :mot_de_passe);";

        $requeteInscriptionMembre = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_INSCRIPTION);

        $requeteInscriptionMembre->bindParam(':prenom', $nouveauMembre["prenom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':nom', $nouveauMembre["nom"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':nom_utilisateur', $nouveauMembre["nom_utilisateur"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':courriel', $nouveauMembre["courriel"], PDO::PARAM_STR);
        $requeteInscriptionMembre->bindParam(':mot_de_passe', $nouveauMembre["mot_de_passe"], PDO::PARAM_STR);

        $reussiteInscription = $requeteInscriptionMembre->execute();
        return $reussiteInscription;
    }

    public static function validerConnexion($connexionMembre){
        $MESSAGE_SQL_VALIDER_CONNEXION = "SELECT prenom, nom, nom_utilisateur, courriel, mot_de_passe
                                            FROM membre
                                            WHERE nom_utilisateur=:nom_utilisateur AND mot_de_passe = :mot_de_passe;";

        $requeteValiderConnexion = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_VALIDER_CONNEXION);

        $requeteValiderConnexion->bindParam(':nom_utilisateur', $connexionMembre["nom_utilisateur"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':mot_de_passe', $connexionMembre["mot_de_passe"], PDO::PARAM_STR);

        $requeteValiderConnexion->execute();
        
        $membre = $requeteValiderConnexion->fetch();
        return $membre;
    }
}