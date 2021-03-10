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
    <script defer>
        function desactiverChampsAdresse(){
            champsAdresse = document.querySelector(".adresse-livraison").querySelectorAll("input");
            champsAdresse.forEach(champ => {
                if(champ.type == "text"){           
                    champ.disabled = !champ.disabled;
                    champ.value = (champ.disabled) ? "info" : "";
                }
            });
        }
    </script>
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
            <form method="post" id="formulaire-paiement" action="paiement-3.php">
                <fieldset>
                    <legend>Étape 2/3 - Informations de paiement</legend>
                    <div id="informations-paiement">
                        <h5>Informations de carte bancaire</h5>
                        <div id="informations-carte">
                            <span>Aucune information à fournir. Le paiement par PayPal est obligatoire.</span>
                        </div>
                        <h5>Adresse de livraison</h5>
                        <div id="adresse-livraison">
                            <input type="checkbox" id="adresse-compte" name="adresse-compte" onclick="desactiverChampsAdresse();">
                            <label for="adresse-compte">Utiliser l'adresse associée à mon compte</label>
                            <label for="prenom">
                                Prénom <input type="text" id="prenom" name="prenom">
                            </label>

                            <label for="nom">
                                Nom <input type="text" id="nom" name="nom">
                            </label>

                            <label for="numero-rue">
                                Num. rue <input type="text" id="numero-rue" name="numero-rue">
                            </label>

                            <label for="numero-appartement">
                                Appt/Chambre <input type="text" id="numero-appartement" name="numero-appartement">
                            </label>

                            <label for="rue">
                                Rue <input type="text" id="rue" name="rue">
                            </label>

                            <label for="ville">
                                Ville <input type="text" id="ville" name="ville">
                            </label>

                            <label for="code-postal">
                                Code postal <input type="text" id="code-postal" name="code-postal">
                            </label>

                            <label for="pays">
                                Pays <input type="text" id="pays" name="pays">
                            </label>
                        </div>
                    </div>
                    <div id="informations-cote">
                        <div id="instructions">
                            <h4>Veuillez indiquer vos informations de paiement</h4>
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
                                <input type="submit" value="Payer" name="action-paiement-2">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>