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
    <title>Page Item</title>
</head>

<body>
    <section class="section">
        <a href="index.php">Retour</a>

        <div class="item">
            <img src="img/<?php echo $item['image']; ?>" width="250" height="250" alt="Item">
            <h2 class="itemTitre" style="text-align: center;"><?php echo $item['nom']; ?></h2>
        </div>

        <div class="descriptionItem">

            <h1>Page item prototype</h1>
            <p><?php echo $item['description']; ?></p>
        </div>
    </section>

</body>
</html>