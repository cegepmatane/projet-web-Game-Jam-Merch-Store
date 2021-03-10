<?php
if(isset($_POST['langue'])){
    if ($_POST['langue'] == "Français"){
        $_SESSION['langue'] = "fr_CA";
    }
    if ($_POST['langue'] == "English"){
        $_SESSION['langue'] = "en_CA";
    }
}

if(isset($_SESSION['langue'])) {
    $locale = $_SESSION['langue'];
} else {
    $locale = "fr_CA";
}

$domaine = "promotemyjam";

setlocale(LC_ALL,$locale);

bindtextdomain($domaine,"locale");
textdomain($domaine);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title><?=_("Page Inscription")?></title>
</head>
<body>
    <?php if($locale == "en_CA"){ ?>
    <form method="post">
    <input type="submit" name="langue" value="Français">
    </form>
    <?php } if($locale == "fr_CA"){ ?>
    <form method="post">
    <input type="submit" name="langue" value="English">
    </form>
    <?php } ?>
      
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>
     <!--MAIN-->
     <section class="contenu-page">
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
                    <input type="submit" value="S'inscrire" name="action-inscription">
                </div>
            </form>
            
        </section>
    </body>
</html>