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
    <title>Page Connexion</title>
</head>
<body>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>
     <!--MAIN-->
     <section class="contenu-page">
            <form method="post" id="formulaire-authentification" action="traitement-connexion.php">
                <div id="bloc-authentification">
                    <label for="adresse-courriel">Adresse courriel</label>
                    <input type="email" id="adresse-courriel" name="adresse-courriel">

                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp">    
                </div>
                <div id="action-formulaire">
                    <input type="submit" value="Se connecter" name="action-connexion">
                </div>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>