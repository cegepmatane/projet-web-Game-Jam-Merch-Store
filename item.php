<?php

include "include/configuration.php";

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
require_once CHEMIN_INCLUDE."entete.php";

$id = $_GET['id'];
$item = PromotemyjamDAO::lireItem($id);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title><?=_("Page Item")?></title>
</head>

<body>
	<div class="btnr">
	<a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>
    <section class="section-item">
        <a href="index.php"><?=_("Retour")?></a>

        <div class="item">
            <img src="img/<?php echo $item['image']; ?>" width="250" height="250" alt="Item">
            <h2 class="itemTitre" style="text-align: center;"><?php echo $item['nom']; ?></h2>
        </div>

        <div class="descriptionItem">

            <h1>Page item prototype</h1>
            <p><?php echo $item['description']; ?></p>
			<?php if ($item['stock'] > 0 && $item['id_button'] <> NULL) { ?>
				<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="<?php echo $item['id_button']; ?>">
					<input type="image" src=<?=_("https://www.paypalobjects.com/fr_CA/i/btn/btn_cart_LG.gif")?> border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
					<img alt="" border="0" src=<?=_("https://www.paypalobjects.com/fr_CA/i/scr/pixel.gif")?> width="1" height="1">
				</form>
			<?php } else { ?>
				<p><?=_("Actuellement indisponible")?></p>
			<?php } ?>
        </div>
    </section>

</body>
</html>