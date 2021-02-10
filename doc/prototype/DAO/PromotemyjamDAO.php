<?php

include CHEMIN_ACCESSEUR."BaseDeDonnee.php";

class PromotemyjamDAO{


    public static function lireItem($id){
        $MESSAGE_SQL_ITEM = "SELECT * FROM `serie` WHERE id=:id;";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_ITEM);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $item = $requete->fetch();
        return $item;
    }

    public static function lireCollection($id){
        $MESSAGE_SQL_COLLECTION = "SELECT * FROM `serie` WHERE id=:id;";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_COLLECTION);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $collection = $requete->fetch();
        return $collection;
    }

    public static function listerItem(){
        $MESSAGE_SQL_LISTE_ITEM = "SELECT * FROM item";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_LISTE_ITEM);
        $requete->execute();
        $listeItem = $requete->fetchAll();
        return $listeItem;
    }

    public static function listerCollection(){
        $MESSAGE_SQL_LISTE_COLLECTION = "SELECT * FROM collection";

        $requete = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_LISTE_COLLECTION);
        $requete->execute();
        $listeCollection = $requete->fetchAll();
        return $listeCollection;
    }

    public static function ajouterItem($item)
    {
        $REQUETE_AJOUTER_ITEM = "INSERT INTO `item`(`nom`, `type`, `description`, `prix`, `id_collection`) ". 
                            "VALUES(".
                                ":nom,". 
                                ":type,". 
                                ":description,". 
                                ":prix,". 
                                ":id_collection,". 
                            ");";


        $requete = BaseDeDonnee::getConnexion()->prepare($REQUETE_AJOUTER_ITEM);

        $requete->bindParam(':nom', $item['nom'], PDO::PARAM_STR);
        $requete->bindParam(':type', $item['type'], PDO::PARAM_STR);
        $requete->bindParam(':description', $item['description'], PDO::PARAM_STR);
        $requete->bindParam(':prix', $item['prix'], PDO::PARAM_INT);
        $requete->bindParam(':id', $item['id'], PDO::PARAM_INT);

        $reussitAjout = $requete->execute();

        return $reussitAjout;
    }

    public static function modifierItem($item)
    {
        $REQUETE_MODIFIER_ITEM = "UPDATE `item` SET". 
                                "`nom`= :nom,".
                                "`type`= :type,". 
                                "`description`= :description,". 
                                "`prix`= :prix,". 
                            " WHERE id=:id;";


        $requete = BaseDeDonnee::getConnexion()->prepare($REQUETE_MODIFIER_ITEM);

        $requete->bindParam(':nom', $item['nom'], PDO::PARAM_STR);
        $requete->bindParam(':type', $item['type'], PDO::PARAM_STR);
        $requete->bindParam(':description', $item['description'], PDO::PARAM_STR);
        $requete->bindParam(':prix', $item['prix'], PDO::PARAM_INT);
        $requete->bindParam(':id', $item['id'], PDO::PARAM_INT);

        $reussiteModif = $requete->execute();

        return $reussiteModif;
    }

}