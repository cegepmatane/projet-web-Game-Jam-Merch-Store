<?php
include "include/configuration.php";
include CHEMIN_INCLUDE."traduction.php";
require CHEMIN_ACCESSEUR."MembreDAO.php";

if(isset($_POST['action-authentification'])){

    $filterMembre = array();
    $filterMembre['courriel'] = FILTER_SANITIZE_STRING;
    $filterMembre['mot_de_passe'] = FILTER_SANITIZE_STRING;
    $membre = filter_input_array(INPUT_POST, $filterMembre);

    $membre['courriel'] = htmlspecialchars($membre['courriel']);
    // $membre['motdepasseConnect'] = $membre['motdepasseConnect'];  

    if(!empty($membre['mot_de_passe']) AND !empty($membre['courriel'])){
        $user = MembreDAO::validerConnexion($membre);
        if(!empty($user['id'])){
            if(password_verify($membre['mot_de_passe'], $user['mot_de_passe'])){
                if($membre['confirme'] == 1)
                {
                    $_SESSION['membre']['id'] = $user['id'];
                    $_SESSION['membre']['prenom'] = $user['prenom'];
                    $_SESSION['membre']['nom_utilisateur'] = $user['nom_utilisateur'];
                    $_SESSION['membre']['nom'] = $user['nom'];
                    $_SESSION['membre']['courriel'] = $user['courriel'];
                    $_SESSION['membre']['mot_de_passe'] = $user['mot_de_passe'];
    
                    header("Location: index.php"); //redirection sur la page de notre choix
                } else {
                    $erreur = _("Vous devez confirmer votre inscription avant de vous connecter.");
                }
            } else {
                $erreur = _("Votre mot de passe est incorrect !");
            }
        } else {
            $erreur = _("L'utilisateur semble etre inexistant !");
        }
    } else {
        $erreur = _("Tous les champs doivent etre completes !");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title><?=_("Page authentification")?></title>
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
            <form method="post" id="formulaire-authentification" action="authentification.php">
                <div id="bloc-authentification">
                    <label for="courriel"><?=_("Adresse courriel")?></label>
                    <input type="email" id="courriel" name="courriel">

                    <label for="mot_de_passe"><?=_("Mot de passe")?></label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe">    
                </div>
                <div id="action-formulaire">
                    <input type="submit" value=<?=_("Se connecter")?> name="action-authentification">
                </div>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>