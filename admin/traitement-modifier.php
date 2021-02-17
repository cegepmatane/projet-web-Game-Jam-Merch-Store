<?php

require "../include/configuration.php";
require CHEMIN_ACCESSEUR . "PromotemyjamDAO.php";
require CHEMIN_MODELE . "Item.php";

$ancienneImage = $_POST['ancienne-image'];
//print_r($ancienneImage);


//Ajout de l'image sur le serveur
$repertoireImage = CHEMIN_IMAGE;
$image = $_FILES['image']['name'];
$fichierDestination = $repertoireImage . $image;
$fichierSource = $_FILES['image']['tmp_name'];

if($image!="") {
    move_uploaded_file($fichierSource, $fichierDestination);
} else {
    $image = $ancienneImage;
}

//Filtrages des champs remplis dans le formulaire de modification
$filtresModificationItem = array();
$filtresModificationItem['id'] = FILTER_SANITIZE_NUMBER_INT;
$filtresModificationItem['nom'] = FILTER_SANITIZE_STRING;
$filtresModificationItem['type'] = FILTER_SANITIZE_STRING;
$filtresModificationItem['description'] = FILTER_SANITIZE_STRING;
$filtresModificationItem['prix'] = FILTER_SANITIZE_NUMBER_INT;


$item_arr = filter_input_array(INPUT_POST, $filtresModificationItem);
$item_arr["image"] = $image;


$item = new Item($item_arr['id'],
                $item_arr['nom'],
                $item_arr['type'],
                $item_arr['description'],
                $item_arr['prix'], 
                $item_arr['image'],
            );

//print_r($item);

$reussiteModification = PromotemyjamDAO::modifierItem($item);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier un produit promotionnel</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="contenu-page">
            <header>
                <h1>Modification d'un item : <?php echo $item->getNom(); ?></h1>
            </header>
            <div id="bouton-retour">
                <a href="liste-admin.php"><h2> < Panneau d'administration</h2></a>
            </div>

            <?php

            if($reussiteModification)
            {
            ?>
                <h2>Votre item a été modifié dans la base de données!</h2>
            <?php
            }

            ?>
<?php require_once CHEMIN_INCLUDE."/pied-page.php"; ?>
