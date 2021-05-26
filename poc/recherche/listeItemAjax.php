<?php
include 'include/configuration.php';

require_once CHEMIN_ACCESSEUR."PromotemyjamDAO.php";

$listeItem = PromotemyjamDAO::listerItems();
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<items>
  <?php
  foreach($listeItem as $item)
  {/*
    if(strpos($item['nom'], $_GET['q']) !== false){*/
  ?>
      <item>
          <id><?php echo $item['id'];?></id>
          <nom><?php echo $item['nom']; ?></nom>
          <prix><?php echo $item['prix']; ?></prix>
      </item>
  <?php
    //}
  }
  ?>
</items>
