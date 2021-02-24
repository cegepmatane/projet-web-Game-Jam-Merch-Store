<?php
session_start();
include "include/configuration.php";
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
                $_SESSION['membre']['id'] = $user['id'];
                $_SESSION['membre']['prenom'] = $user['prenom'];
                $_SESSION['membre']['nom'] = $user['nom'];
                $_SESSION['membre']['courriel'] = $user['courriel'];
                $_SESSION['membre']['mot_de_passe'] = $user['mot_de_passe'];

                header("Location: index.php"); //redirection sur la page de notre choix avec l'id de session
            } else {
                $erreur = "Votre mot de passe est incorrect !";
            }
        } else {
            $erreur = "L'utilisateur semble etre inexistant !";
        }
    } else {
        $erreur = "Tous les champs doivent etre completes !";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Page authentification</title>
</head>
<body>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>
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
                    <label for="courriel">Adresse courriel</label>
                    <input type="email" id="courriel" name="courriel">

                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe">    
                </div>
                <div id="action-formulaire">
                    <input type="submit" value="Se connecter" name="action-authentification">
                </div>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>