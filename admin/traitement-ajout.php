<?php

require "../include/configuration.php";
require CHEMIN_ACCESSEUR . "PromotemyjamDAO.php";
require CHEMIN_MODELE . "Item.php";

//Ajout de l'image sur le serveur
$repertoireImage = CHEMIN_IMAGE;
$image = $_FILES['image']['name'];
$fichierDestination = $repertoireImage . $image;
$fichierSource = $_FILES['image']['tmp_name'];
move_uploaded_file($fichierSource, $fichierDestination);

//Filtrages des champs remplis dans le formulaire d'ajout
$filtresAjoutItem = array();
$filtresAjoutItem["nom"] = FILTER_SANITIZE_STRING;
$filtresAjoutItem["type"] = FILTER_SANITIZE_STRING;
$filtresAjoutItem["description"] = FILTER_SANITIZE_STRING;
$filtresAjoutItem["prix"] = FILTER_SANITIZE_NUMBER_INT;
$filtresAjoutItem["id-collection"] = FILTER_SANITIZE_NUMBER_INT;

$item_arr = filter_input_array(INPUT_POST, $filtresAjoutItem);
$item_arr["image"] = $image;

$item = new Item($item_arr['nom'],
                $item_arr['type'],
                $item_arr['description'],
                $item_arr['prix'],
                $item_arr['image'],
                $item_arr['id-collection']
            );

print_r($item);

$reussiteAjout = PromotemyjamDAO::ajouterItem($item);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajouter un produit promotionnel</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="contenu-page">
            <header>
                <h1>Ajout d'un item : <?php echo $item->getNom(); ?></h1>
            </header>
            <div id="bouton-retour">
                <a href="liste-admin.php"><h2> < Panneau d'administration</h2></a>
            </div>

            <?php

            if($reussiteAjout)
            {
            ?>
                <h2>Votre item a été ajouté dans la base de données!</h2>
            <?php
            }

            ?>
<?php require_once CHEMIN_INCLUDE."/pied-page.php"; ?>
