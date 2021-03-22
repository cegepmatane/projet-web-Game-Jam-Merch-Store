<?php

include "../include/configuration.php";
require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

//Récupération des collections
$listeCollections = PromotemyjamDAO::listerCollections();
//Recuperation des items
//TODO Faire la liste selon la collection
$listeItem = PromotemyjamDAO::listerItems();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Panneau d'administration</title>
</head>

<body>
    <div id="bouton-retour">
        <a href="../index.php">Retour</a>
    </div>
    <?php
    foreach($listeCollections as $collection)
    {
    ?>

    <section class="section-liste">
        <h1 class="titre"><?php echo $collection["nom"]; ?></h1>
        <div class="contain-liste">
            <a href="supprimer-item.php">Supprimer un produit</a>
                
            <?php
            foreach($listeItem as $item)
            {
                //$item = get_object_vars($item);
                if($item["id_collection"] == $collection["id"])
                {
            ?>
                    <div class="itemListe">
                        <a href="modifier-item.php?id=<?php echo $item["id"]; ?>"><img src="../img/<?php echo $item['image']; ?>" width="150" height="150" alt="Item"></a>
                        <h2 class="itemTitre" style="text-align: center;"><?= $item["nom"]; ?></h2>
                    </div>
            <?php
                }
            }
            ?>
            <div id="bouton-ajouter">
                <a href="ajouter-item.php?id_collection=<?php echo $collection['id']; ?>">+ Ajouter</a>
            </div>
        </div>  
    </section>

    <?php
    }
    ?>

<?php
require_once CHEMIN_INCLUDE."pied-page.php";
?>

