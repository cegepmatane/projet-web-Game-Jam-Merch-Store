<?php

include CHEMIN_INCLUDE."configuration.php";

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

$listeItem = PromotemyjamDAO::listerItem();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Page Liste</title>
</head>

<body>

    <section class="section">
        <a href="index.html">Retour</a>

        <h1 class="titre">Paf Le Roi</h1>
        <div class="contain">
        
        <?php
            foreach($listeItem as $item)
            {
                $item = get_object_vars($item);

                if($item["id_collection"] == 2)
                {

        ?>

                    <div class="itemListe">
                        <a href="item.html"><img src="img/test.png" alt="Item"></a>
                        <h2 class="itemTitre" style="text-align: center;"><?= $item["nom"]; ?></h2>
                    </div>

        <?php
                }
            }
        ?>

        </div>  
    </section>

    <br>

    <section class="section">
        <h1 class="titre">Kanu</h1>
        <div class="contain">

        <?php
            foreach($listeItem as $item)
            {
                $item = get_object_vars($item);

                if($item["id_collection"] == 1)
                {

        ?>
                    <div class="itemListe">
                        <a href="item.html"><img src="img/test.png" alt="Item"></a>
                        <h2 class="itemTitre" style="text-align: center;"><?= $item["nom"]; ?></h2>
                    </div>

        <?php
                }
            }
        ?>

        </div>
    </section>

<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>

