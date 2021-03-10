<?php

include "include/configuration.php";

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Page Paiement</title>
</head>
<body>
    <!--HEADER-->
    <header>
        <div>
            <h1>Paiment</h1>
        </div>
    </header>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

     <!--MAIN-->
     <section class="contenu-page">
            <form method="post" id="formulaire-paiement" action="paiement-2.php">
                <fieldset>
                    <legend>Étape 1/3 - Vérification du panier</legend>
                    <div id="informations-panier">
                        <div class="article">
                            <img src="img/test.png" width="100" height="100">
                            <div id="texte-article">
                                <h5>Titre</h5>
                                <p>Lorem, ipsum dolor sit amet</p>
                                <p>Disponible</p>
                            </div>
                            <span>$9.99</span>
                        </div>
                        <div class="article">
                            <img src="img/test.png" width="100" height="100">
                            <div id="texte-article">
                                <h5>Titre</h5>
                                <p>Lorem, ipsum dolor sit amet</p>
                                <p>Disponible</p>
                            </div>
                            <span>$9.99</span>
                        </div>
                        <div class="article">
                            <img src="img/test.png" width="100" height="100">
                            <div id="texte-article">
                                <h5>Titre</h5>
                                <p>Lorem, ipsum dolor sit amet</p>
                                <p>Disponible</p>
                            </div>
                            <span>$9.99</span>
                        </div>
                        <div class="article">
                            <img src="img/test.png" width="100" height="100">
                            <div id="texte-article">
                                <h5>Titre</h5>
                                <p>Lorem, ipsum dolor sit amet</p>
                                <p>Disponible</p>
                            </div>
                            <span>$9.99</span>
                        </div>
                    </div>
                    <div id="informations-cote">
                        <div id="instructions">
                            <h4>Veuillez vérifier le contenu de votre panier</h4>
                        </div>
                        <div id="montants">
                            <div id="montant-sous-total">
                                <label>Sous-total</label>
                                <span>$9.99</span>
                            </div>
                            <div id="montant-tps">
                                <label>TPS (5%)</label>
                                <span>$9.99</span>
                            </div>
                            <div id="montant-tvq">
                                <label>TVQ (9.975%)</label>
                                <span>$9.99</span>
                            </div>
                            <div id="montant-total">
                                <label>Total</label>
                                <span>$9.99</span>
                            </div>

                            <div id="action-formulaire">
                                <input type="submit" value="Passer au paiement" name="action-paiement-1">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>