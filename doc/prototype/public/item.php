<?php
    include CHEMIN_INCLUDE."configuration.php";

    require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";
    require_once CHEMIN_INCLUDE."entete.php";

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $item = PromotemyjamDAO::lireItem($id);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Page Item</title>
</head>

<body>
    <section class="section">
        <a href="index.html">Retour</a>

        <div class="item">
            <img src="img/test.png" alt="Item">
            <h2 class="itemTitre" style="text-align: center;"><?= $item["nom"]; ?></h2>
        </div>

        <div class="descriptionItem">

            <h1><?= $item["nom"]; ?></h1>
            <p><?= $item["description"]; ?></p>

            <p><?= $item["prix"]; ?></p>
        </div>
    </section>

</body>
</html>