<?php

include 'include/configuration.php';

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";

$listeItem = PromotemyjamDAO::listerItems();

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Page Title</title>
    <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <a href="admin/liste-admin.php">Panneau d'administration</a>
        <div class="tete">
            <a href="liste.php"><div style="background-image: url('./img/item2.png');"></div></a>
            <a href="liste.php"><div style="background-image: url('./img/item3.png');"></div></a>
        </div>
        <hr>
        <div class="content">
            <?php
            foreach($listeItem as $item)
            {
            ?>
                <div>
                    <a href="item.php?id=<?php echo $item['id']; ?>"><img src='./img/item1.png'></a>
                    <p><?php echo $item['nom']; ?></p>
                    <span><?php echo $item['prix']; ?>$</span>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>