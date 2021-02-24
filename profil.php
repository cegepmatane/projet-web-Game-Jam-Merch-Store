<?php

include "include/configuration.php";

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

 
    $afficher_profil = $pdo->query("SELECT * FROM membre WHERE id = ?", array($_SESSION['id']));

    $afficher_profil = $afficher_profil->fetch();

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $nom = htmlentities(trim($nom));
            $prenom = htmlentities(trim($prenom));
            $courriel = htmlentities(strtolower(trim($courriel)));
 
            if(empty($nom)){
                $valid = false;
                $er_nom = "Il faut mettre un nom";
            }
 
            if(empty($prenom)){
                $valid = false;
                $er_prenom = "Il faut mettre un prénom";
            }
 
            if(empty($courriel)){
                $valid = false;
                $er_mail = "Il faut mettre un courriel";
 
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $courriel)){
                $valid = false;
                $er_mail = "Le courriel n'est pas valide";
 
            }else{
                $req_mail = $DB->query("SELECT courriel 
                    FROM membre 
                    WHERE courriel = ?",
                    array($courriel));
                $req_mail = $req_mail->fetch();
 
                if ($req_mail['courriel'] <> "" && $_SESSION['courriel'] != $req_mail['courriel']){
                    $valid = false;
                    $er_mail = "Ce courriel existe déjà";
                }
            }
 
            if ($valid){
 
                $DB->insert("UPDATE membre SET prenom = ?, nom = ?, courriel = ? 
                    WHERE id = ?", 
                    array($prenom, $nom,$courriel, $_SESSION['id']));
 
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['courriel'] = $courriel;
 
                header('Location:  profil.php');
                exit;
            }   
        }
    }
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
                <label for="nom-utilisateur">
                    Nom d'utilisateur <?php
                if (isset($er_nom)){
                ?>
                    <div><?= $er_nom ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_profil['nom'];}?>" required>   
            
					<input type="text" placeholder="Votre nom d'utilisateur id="nom-utilisateur" name="nom-utilisateur" value="<?php if(isset($prenom)){ echo $nom_utilisateur; }else{ echo $afficher_profil['nom_utilisateur'];}?>" required>
					<?php
                if (isset($nom_utilisateur)){
                ?>
                    <div><?= $nom_utilisateur ?></div>
				<?php
                }
                ?>
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