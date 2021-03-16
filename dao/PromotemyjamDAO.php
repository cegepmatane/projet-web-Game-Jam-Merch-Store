<?php
require_once "BaseDeDonnees.php";

class PromotemyjamDAO{

    //Permet de détailler les valeurs d'un item
    public static function lireItem($id){
        $MESSAGE_SQL_ITEM = "SELECT id, nom, type, description, prix, taille, image, stock, id_button FROM item WHERE id=:id;";

        $requete = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_ITEM);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $item = $requete->fetch();
        return $item;
    }

    //Liste tous les items de la base de données
    public static function listerItems(){
        $MESSAGE_SQL_LISTE_ITEM = "SELECT id, nom, type, prix, image, id_collection FROM item";

        $requete = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_ITEM);
        $requete->execute();
        $listeItem = $requete->fetchAll();
        return $listeItem;
    }
    
    //Recupère la collection avec l'ID donné
    public static function lireCollection($id){
        $MESSAGE_SQL_COLLECTION = "SELECT id, nom FROM collection WHERE id=:id;";

        $requete = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_COLLECTION);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $collection = $requete->fetch();
        return $collection;
    }

    //Liste toutes les collections de la base de données
    public static function listerCollections(){
        $MESSAGE_SQL_LISTE_COLLECTION = "SELECT id, nom FROM collection";

        $requete = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_COLLECTION);
        $requete->execute();
        $listeCollection = $requete->fetchAll();
        return $listeCollection;
    }

    //Ajoute un item dans une collection donnée
    public static function ajouterItem($item)
    {
        $REQUETE_AJOUTER_ITEM = "INSERT INTO `item`(`nom`, `type`, `description`, `prix`, `image`, `id_collection`) ". 
                            "VALUES(".
                                ":nom,". 
                                ":type,". 
                                ":description,". 
                                ":prix,". 
                                ":image,".
                                ":id_collection". 
                            ");";

        $nom = $item->getNom();
        $type =$item->getType();
        $description = $item->getDescription();
        $prix = $item->getPrix();
        $image = $item->getImage();
        $id_collection = $item->getIdCollection();

        $requete = BaseDeDonnees::getConnexion()->prepare($REQUETE_AJOUTER_ITEM);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->bindParam(':type', $type, PDO::PARAM_STR);
        $requete->bindParam(':description', $description, PDO::PARAM_STR);
        $requete->bindParam(':prix', $prix, PDO::PARAM_INT);
        $requete->bindParam(':image', $image, PDO::PARAM_STR);
        $requete->bindParam(':id_collection', $id_collection, PDO::PARAM_INT);
        $reussitAjout = $requete->execute();
        return $reussitAjout;
    }

    //Modifie un item dans une collection
    //L'item ne peut pas changer de collection
    public static function modifierItem($item)
    {
        $REQUETE_MODIFIER_ITEM = "UPDATE `item` SET". 
                                "`nom`= :nom,".
                                "`type`= :type,". 
                                "`description`= :description,". 
                                "`prix`= :prix,".
                                "`image`= :image". 
                            " WHERE id=:id;";

        $nom = $item->getNom();
        $type =$item->getType();
        $description = $item->getDescription();
        $prix = $item->getPrix();
        $image = $item->getImage();
        $id = $item->getId();

        $requete = BaseDeDonnees::getConnexion()->prepare($REQUETE_MODIFIER_ITEM);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->bindParam(':type', $type, PDO::PARAM_STR);
        $requete->bindParam(':description', $description, PDO::PARAM_STR);
        $requete->bindParam(':prix', $prix, PDO::PARAM_INT);
        $requete->bindParam(':image', $image, PDO::PARAM_STR);
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $reussiteModif = $requete->execute();

        return $reussiteModif;
    }

    //Supprimer l'item d'une collection
    public static function supprimerItem($item)
    {
        $REQUETE_SUPPRIMER_ITEM = "DELETE FROM item WHERE id=:id;";
        $requete = BaseDeDonnees::getConnexion()->prepare($REQUETE_SUPPRIMER_ITEM);
        $requete->bindParam(':id', $item->getId(), PDO::PARAM_INT);
        $reussiteSuppression = $requete->execute();

        return $reussiteSuppression;
    }

    public static function randomItem()
    {
        $REQUETE_RANDOM_ITEM = "SELECT * FROM item ORDER BY RAND() LIMIT 1";

        $requete = BaseDeDonnees::getConnexion()->prepare($REQUETE_RANDOM_ITEM);
        $requete->execute();
        $item = $requete->fetch();
        return $item;
    }

}