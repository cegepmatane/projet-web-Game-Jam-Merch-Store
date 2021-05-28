<?php
include 'include/configuration.php';
include CHEMIN_INCLUDE."traduction.php";
require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";

$listeItem = PromotemyjamDAO::listerItems();
$randomitem = PromotemyjamDAO::randomItem();

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Page Title</title>
    <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
	<div class="barre-navigation">
        <a class="navigation-admin" href="admin/liste-admin.php"><?=_("Panneau d'administration")?></a>

        <form class="traduction-form" method="post"><input class="traduction-input" type="submit" name="langue" value=<?=_("English")?>></form>

        <?php if(isset($_SESSION['membre']['id'])){ ?>
            <a class="navigation-utilisateur" href="deconnexion.php"><?=_("Se déconnecter")?></a>
            <a class="navigation-utilisateur" href="profil.php"><?=_("Espace membre")?></a>

			<form class="navigation-utilisateur" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
				<input type="image" src=<?=_("https://www.paypalobjects.com/fr_CA/i/btn/btn_viewcart_LG.gif")?> border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
				<img alt="" border="0" src=<?=_("https://www.paypalobjects.com/fr_CA/i/scr/pixel.gif")?> width="1" height="1">
			</form>
            <a class="navigation-utilisateur" href="historique.php"><?=_("Historique des commandes")?></a>
        <?php
        } else {
        ?>
            <a class="navigation-utilisateur" href="inscription.php"><?=_("Créer un compte")?></a>
            <a class="navigation-utilisateur" href="authentification.php"><?=_("S'authentifier")?></a>
        <?php
        }
        ?>
	</div>
        <div class="tete-index">
            <a href="liste.php"><img src="img/item2.png"></a>
            <a href="liste.php"><img src="img/item3.png"></a>
        </div>
        <hr>


        <div class="content">
            <script src="recherche.js" defer></script>

        </div>
    </body>
</html>
