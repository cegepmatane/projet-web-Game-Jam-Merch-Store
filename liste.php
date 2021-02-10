<?php

include "include/configuration.php";

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
    <link rel="stylesheet" href="css/style.css" />
    <title>Page Liste</title>
</head>

<body>
    <?php
    foreach($listeCollections as $collection)
    {
    ?>

    <section class="section">
        <a href="index.php">Retour</a>

        <h1 class="titre"><?php echo $collection["nom"]; ?></h1>
        <div class="contain">
        
        <?php
        foreach($listeItem as $item)
        {
            //$item = get_object_vars($item);
            if($item["id_collection"] == $collection["id"])
            {
        ?>
                <div class="itemListe">
                    <a href="item.php?id=<?php echo $item["id"]; ?>"><img src="img/test.png" alt="Item"></a>
                    <h2 class="itemTitre" style="text-align: center;"><?= $item["nom"]; ?></h2>
                </div>
        <?php
            }
        }
        ?>

        </div>  
    </section>

    <?php
    }
    ?>

<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>

