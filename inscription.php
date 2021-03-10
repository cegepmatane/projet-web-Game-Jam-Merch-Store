<?php
include "include/configuration.php";
include CHEMIN_INCLUDE."traduction.php";
require CHEMIN_ACCESSEUR."MembreDAO.php";

if(isset($_POST['action-inscription'])){

    $longueurKey = 15;
    $key = "";
    for($i=1;$i<$longueurKey;$i++){
        $key .= mt_rand(0,9);
    }

    $filterMembre = array();
    $filterMembre['prenom'] = FILTER_SANITIZE_STRING;
    $filterMembre['nom'] = FILTER_SANITIZE_STRING;
    $filterMembre['nom_utilisateur'] = FILTER_SANITIZE_STRING;
    $filterMembre['courriel'] = FILTER_SANITIZE_EMAIL;
    $filterMembre['mot_de_passe'] = FILTER_SANITIZE_STRING;
    $filterMembre['mot_de_passe_confirmation'] = FILTER_SANITIZE_STRING;
    $membre = filter_input_array(INPUT_POST, $filterMembre);

    $membre['prenom'] = htmlspecialchars($membre['prenom']);
    $membre['nom'] = htmlspecialchars($membre['nom']);
    $membre['nom_utilisateur'] = htmlspecialchars($membre['nom_utilisateur']);
    $membre['courriel'] = htmlspecialchars($membre['courriel']);
    $membre['mot_de_passe'] = password_hash($membre['mot_de_passe'], PASSWORD_DEFAULT);
    $membre['confirmkey'] = $key;

    if(!empty($membre['prenom']) AND !empty($membre['nom'])
        AND !empty($membre['nom_utilisateur']) AND !empty($membre['courriel'])
        AND !empty($membre['mot_de_passe']) AND !empty($membre['mot_de_passe_confirmation'])){

        if(strlen($membre['prenom']) <= 255){
            if(strlen($membre['nom']) <= 255){
                if(strlen($membre['nom_utilisateur']) <= 255){
                    if(filter_var($membre['courriel'], FILTER_VALIDATE_EMAIL)){
                        if(password_verify($membre['mot_de_passe_confirmation'], $membre['mot_de_passe'])){
                            $reussiteAjout = MembreDAO::enregistrerMembre($membre);
                            $lireMembre = MembreDAO::lireMail($membre['courriel']);

                            if($reussiteAjout){
                                $envoyeur_courriel = "www-data@mail.freehv.me";
                                $sujet_courriel = "Inscription ".$membre['nom_utilisateur'];
                                $contenu_courriel = "Bonjour " . $membre['prenom'] . " " . $membre['nom'] . " !

Merci de vous etre inscrits sur notre merveilleux site Promote My Jam !
Vous faites officiellement partie de la grande famille cliente.
Vous pouvez maintenant acceder a votre espace client en visitant www.promotemyjam.store/authentification.php

Vous n'aurez plus qu'a entrer votre nom d'utilisateur et votre mot de passe pour vous connecter et acceder a vos informations personnelles et recus de paiement.
Merci de confirmer votre mail en cliquant sur le lien suivant : 
https://www.promotemyjam.store/confirmation.php?id=" . $lireMembre['id'] . "&key=" . $membre['confirmkey'] . "

Nous vous souhaitons un bon sejour en notre compagnie !

Cordialement,
L'equipe Promote My Jam";
                                
                                $destinataire_courriel = $membre['courriel'];
    
                                mail($destinataire_courriel, $sujet_courriel, $contenu_courriel);

                                header('location: index.php');
                            }
                        } else {
                            $erreur = _("Les mots de passe doivent correspondre !");
                        }
                    } else {
                        $erreur = _("Votre courriel n'est pas valide");
                    }
                } else {
                    $erreur = _("Votre nom d'utilisateur ne doit pas dépasser 255 caractères !");
                }
            } else {
                $erreur = _("Votre nom ne doit pas dépasser 255 caractères !");
            }
        } else {
            $erreur = _("Votre prénom ne doit pas dépasser 255 caractères !");
        }
    } else {
        $erreur = _("Tous les champs doivent être complétés !");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title><?=_("Page Inscription")?></title>
</head>
<body>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

    <form class="traduction-form" method="post"><input class="traduction-input" type="submit" name="langue" value=<?=_("English")?>></form>

     <!--MAIN-->
     <section class="contenu-page">
            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
            <form method="post" id="formulaire-authentification" action="inscription.php">
                <div id="bloc-authentification">
                    <label for="prenom"><?=_("Prénom")?></label>
                    <input type="text" id="prenom" name="prenom">
                    
                    <label for="nom"><?=_("Nom")?></label>
                    <input type="text" id="nom" name="nom">

                    <label for="nom_utilisateur"><?=_("Nom d'utilisateur")?></label>
                    <input type="text" id="nom_utilisateur" name="nom_utilisateur">

                    <label for="courriel"><?=_("Adresse courriel")?></label>
                    <input type="email" id="courriel" name="courriel">

                    <label for="mot_de_passe"><?=_("Mot de passe")?></label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe">

                    <label for="mot_de_passe_confirmation"><?=_("Confirmer votre mot de passe")?></label>
                    <input type="password" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation">
                </div>
                <div id="action-formulaire">
                    <input type="submit" value=<?=_("S'inscrire")?> name="action-inscription">
                </div>
            </form>
            
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>
