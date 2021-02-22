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
    <title>Page Inscription</title>
</head>
<body>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>
     <!--MAIN-->
     <section class="contenu-page">
            <form method="post" id="formulaire-authentification" action="traitement-inscription.php">
                <div id="bloc-authentification">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                    
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">

                    <label for="nom-utilisateur">Nom d'utilisateur</label>
                    <input type="text" id="nom-utilisateur" name="nom-utilisateur">

                    <label for="adresse-courriel">Adresse courriel</label>
                    <input type="email" id="adresse-courriel" name="adresse-courriel">

                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp">    
                </div>
                <div class="button" id="action-formulaire" onclick="location.href='mailto:arceusyo@gmail.com';">Send E-Mail 
                    <input type="submit" value="S'inscrire" name="action-inscription" href = "mailto:estebanescudero282@gmail.com?subject = Feedback&body = Message"
					Send Feedback >
                </div>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>