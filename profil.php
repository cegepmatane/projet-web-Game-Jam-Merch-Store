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
            <h1>Profil</h1>
        </div>
    </header>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

     <!--MAIN-->
    <section class="contenu-page">
        <div id="tete-profil">
            <img src="img/test.png" width="200" height="200">
            <div id="informations-compte">
			<form action="profil.php?id=<?php echo $id;?>" method="post">
   nom:

" type="text" />


   prenom:

" type="text" />

 
   
</form>
                <label for="nom-utilisateur">
                <?php
                if (isset($nom)){
                ?>
                    <div><?= $nom ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>   
            
					<input type="text" placeholder="Votre nom d'utilisateur id="nom-utilisateur" name="nom-utilisateur" value="<?php if(isset($prenom)){ echo $nom_utilisateur; }else{ echo $afficher_profil['nom_utilisateur'];}?>" required>
					
                </label>
                <input type="button" value="Changer">

                <label for="courriel">
                    Courriel <input type="email" id="courriel" name="courriel">
                </label>
                <input type="button" value="Changer">

                <label for="mdp">
                   Mot de passe <input type="password" id="mdp" name="mdp">
				</label>
                <input type="button" value="Changer">
            </div>
        </div>
        <form method="post" class="formulaire-profil" action="profil.php">
            <fieldset>
                <legend>Informations personnelles</legend>
                <div id="adresse-livraison">
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

                    <div id="action-formulaire">
                        <input type="submit" value="Enregistrer" name="action-enregistrer-adresse">
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>