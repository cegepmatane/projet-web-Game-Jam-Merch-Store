<?php 

include "../include/configuration.php";
require CHEMIN_ACCESSEUR."PromotemyjamDAO.php";

//Recevoir l'id de l'item avec GET
$idItem = filter_input(INPUT_GET, 'id');

//Récuperer l'item avec son ID
$item = PromotemyjamDAO::lireItem($idItem);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier un produit promotionnel</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!--HEADER-->
        <header>
            <div>
                <h1>Modifier le produit <?php echo $item['nom']; ?></h1>
                <h4>Remplissez le formulaire pour modifier <?php  echo $item['nom']; ?></h4>
            </div>
        </header>

        <!--MAIN-->
        <section class="contenu-page">
            <form method="post" id="formulaire-item" action="traitement-modifier.php"  enctype="multipart/form-data">
                <fieldset>
                    <legend>Informations sur le produit:</legend>
                    <!-- <label for="collection-item">Inclure dans quelle collection ?</label> -->
                    <input type="hidden" id="id" name="id" value="<?php echo $item['id']; ?>">
                    
                    <div id="bloc-item">
                        <div id="informations-item">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="<?php  echo $item['nom']; ?>">
    
                            <label for="prix">Prix</label>
                            <input type="text" id="prix" name="prix" value="<?php echo $item['prix']; ?>">
                    
                            <select name="type" id="type">
                                <option value="">--Type de produit--</option>
                                <option value="vetement" <?php if($item['type'] == 'vetement'){ echo ' selected="selected"'; } ?>>Vêtement</option>
                                <option value="tasse" <?php if($item['type'] == 'tasse'){ echo ' selected="selected"'; } ?>>Tasse</option>
                                <option value="tableau" <?php if($item['type'] == 'tableau'){ echo ' selected="selected"'; } ?>>Tableau</option>
                                <option value="ballon" <?php if($item['type'] == 'ballon'){ echo ' selected="selected"'; } ?>>Ballon</option>
                                <option value="coque-telephone" <?php if($item['type'] == 'coque-telephone'){ echo ' selected="selected"'; } ?>>Coque de téléphone</option>
                            </select>
    
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Décrire brièvement l'article" cols="45" rows="10"><?php echo $item['description']; ?></textarea>
                        </div>
    
                        <div id="options">
                            <?php if($item['image'] != null) echo '<p>Illustration actuelle</p>'; ?>
                            <img class="miniature" src="../img/<?php echo $item['image']; ?>" alt="image item">
                            <input type="file" name="image" id="image" accept="image/*">
                            <input type="hidden" id="ancienne-image" name="ancienne-image" value="<?php echo $item['image']; ?>">
                            
                            <?php if(isset($item['taille'])) { ?>
                            <ul id="tailles">
                                <label>Taille</label>
                                <li><input type="radio" value="xs" name="taille" <?php if($item['taille'] == 'xs'){ echo 'checked'; } ?>>XS</li>
                                <li><input type="radio" value="s" name="taille" <?php if($item['taille'] == 's'){ echo 'checked'; } ?>>S</li>
                                <li><input type="radio" value="m" name="taille" <?php if($item['taille'] == 'm'){ echo 'checked'; } ?>>M</li>
                                <li><input type="radio" value="l" name="taille" <?php if($item['taille'] == 'l'){ echo 'checked'; } ?>>L</li>
                                <li><input type="radio" value="xl" name="taille" <?php if($item['taille'] == 'xl'){ echo 'checked'; } ?>>XL</li>
                                <li><input type="radio" value="xxl" name="taille" <?php if($item['taille'] == 'xxl'){ echo 'checked'; } ?>>XXL</li>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>

                    <div id="action-formulaire">
                        <a href="liste-admin.php"><input type="button" value="Annuler" name="action-annuler-modifier"></a>
                        <input type="submit" value="Enregistrer" name="action-modifier">
                    </div>
                </fieldset>
            </form>
        </section>
    </body>
</html>