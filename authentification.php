<?php
include "include/configuration.php";
require CHEMIN_ACCESSEUR."MembreDAO.php";

if(isset($_POST['action-authentification'])){

    $filterConnexion = array();

    $filterConnexion['courriel'] = FILTER_SANITIZE_EMAIL;
    $filterConnexion['mot_de_passe'] = FILTER_SANITIZE_STRING;
    $connexionMembre = filter_input_array(INPUT_POST, $filterConnexion);
  
    $connexionMembre['courriel'] = htmlspecialchars($connexionMembre['courriel']);
    //$connexion['mot_de_passe'] = password_hash($connexion['mot_de_passe'], PASSWORD_DEFAULT);


    if(!empty($connexionMembre['courriel']) AND !empty($connexionMembre['mot_de_passe'])){
        $_SESSION['membre'] = MembreDAO::validerConnexion($connexionMembre);
        if(isset($_SESSION['membre']['nom_utilisateur'])){
            header('location: index.php');
        }
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
            <form method="post" id="formulaire-authentification" action="">
                <div id="bloc-authentification">
                    <label for="adresse-courriel">Adresse courriel</label>
                    <input type="email" id="adresse-courriel" name="adresse-courriel">

                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="mdp" name="mdp">    
                </div>
                <div id="action-formulaire">
                    <input type="submit" value="Se connecter" name="action-authentification">
                </div>
            </form>
        </section>
<?php
    require_once CHEMIN_INCLUDE."pied-page.php";
?>