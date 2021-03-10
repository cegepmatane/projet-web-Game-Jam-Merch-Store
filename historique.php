<?php

include "include/configuration.php";
include CHEMIN_INCLUDE."traduction.php";
require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Page Historique</title>
</head>
<body>
    <!--HEADER-->
    <header>
        <div>
            <h1><?=_("Paiement")?></h1>
        </div>
    </header>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

    <form class="traduction-form" method="post"><input class="traduction-input" type="submit" name="langue" value=<?=_("English")?>></form>

    <!--MAIN-->
    <section class="contenu-page">
        <fieldset id="historique">
            <legend><?=_("Historique des commandes")?></legend>
            <a href="#">
                <div class="commande">
                    <img src="img/test.png" width="100" height="100">
                    <div id="texte-article">
                        <h5>Commande du 1 Janvier 2021</h5>
                        <p>Livré</p>
                    </div>
                    <span>$999.99</span>
                </div>
            </a>
            <a href="#">
                <div class="commande">
                    <img src="img/test.png" width="100" height="100">
                    <div id="texte-article">
                        <h5>Commande du 1 Janvier 2021</h5>
                        <p>Livré</p>
                    </div>
                    <span>$999.99</span>
                </div>
            </a>
            <a href="#">
                <div class="commande">
                    <img src="img/test.png" width="100" height="100">
                    <div id="texte-article">
                        <h5>Commande du 1 Janvier 2021</h5>
                        <p>Livré</p>
                    </div>
                    <span>$999.99</span>
                </div>
            </a>
            <a href="#">
                <div class="commande">
                    <img src="img/test.png" width="100" height="100">
                    <div id="texte-article">
                        <h5>Commande du 1 Janvier 2021</h5>
                        <p>Livré</p>
                    </div>
                    <span>$999.99</span>
                </div>
            </a>
        </fieldset>
    </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>