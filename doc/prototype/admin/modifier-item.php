<?php 

//Recevoir l'id de l'item avec GET

//Échaufaud
$item = array(
    "id" => 3,
    "nom" => "Chemise Paf le Roi",
    "type" => "vetement",
    "description" => "La meilleure chemise pour aller fracasser des monarques !",
    "taille" => "l",
    "prix" => 35,
    "image" => "../../../img/chemise.png",
    "id_collection" => 1
);

$tailles = array(
    "vetement" => "Vêtement",
    "tasse" => "Tasse",
    "tableau" => "Tableau",
    "ballon" => "Ballon",
    "coque-telephone" => "Coque de téléphone"
);

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
            <form method="post" id="formulaire-item" action="../admin/liste-admin.php"  enctype="multipart/form-data">
                <fieldset>
                    <legend>Informations sur le produit:</legend>
                    <!-- <label for="collection-item">Inclure dans quelle collection ?</label> -->
                    <input type="hidden" id="id-collection" name="id-collection" value="<?php echo $item['id_collection']; ?>">
                    
                    <div id="item">
                        <div id="informations-item">
                            <label for="nom-item">Nom</label>
                            <input type="text" id="nom-item" name="nom-item" value="<?php  echo $item['nom']; ?>">
    
                            <label for="prix-item">Prix</label>
                            <input type="text" id="prix-item" name="prix-item" value="<?php echo $item['prix']; ?>">
                    
                            <select name="type-item" id="type-item">
                                <option value="">--Type de produit--</option>
                                <option value="vetement" <?php if($item['type'] == 'vetement'){ echo ' selected="selected"'; } ?>>Vêtement</option>
                                <option value="tasse" <?php if($item['type'] == 'tasse'){ echo ' selected="selected"'; } ?>>Tasse</option>
                                <option value="tableau" <?php if($item['type'] == 'tableau'){ echo ' selected="selected"'; } ?>>Tableau</option>
                                <option value="ballon" <?php if($item['type'] == 'ballon'){ echo ' selected="selected"'; } ?>>Ballon</option>
                                <option value="coque-telephone" <?php if($item['type'] == 'coque-telephone'){ echo ' selected="selected"'; } ?>>Coque de téléphone</option>
                            </select>
    
                            <label for="description-item">Description</label>
                            <textarea id="description-item" name="description-item" placeholder="Décrire brièvement l'article" cols="45" rows="10"><?php echo $item['description']; ?></textarea>
                        </div>
    
                        <div id="options-item">
                            <?php if($item['image'] != null) echo '<p>Illustration actuelle</p>' ?>
                            <img class="miniature" src="<?php echo $item['image']; ?>" alt="" >
                            <input type="file" name="image-item" id="image-item" accept="image/*" value="<?php echo $item['image']; ?>">

                            <ul id="tailles">
                                <label>Taille</label>
                                <li><input type="radio" value="xs" name="taille" <?php if($item['taille'] == 'xs'){ echo 'checked'; } ?>>XS</li>
                                <li><input type="radio" value="s" name="taille" <?php if($item['taille'] == 's'){ echo 'checked'; } ?>>S</li>
                                <li><input type="radio" value="m" name="taille" <?php if($item['taille'] == 'm'){ echo 'checked'; } ?>>M</li>
                                <li><input type="radio" value="l" name="taille" <?php if($item['taille'] == 'l'){ echo 'checked'; } ?>>L</li>
                                <li><input type="radio" value="xl" name="taille" <?php if($item['taille'] == 'xl'){ echo 'checked'; } ?>>XL</li>
                                <li><input type="radio" value="xxl" name="taille" <?php if($item['taille'] == 'xxl'){ echo 'checked'; } ?>>XXL</li>
                            </ul>
                        </div>
                    </div>

                    <div id="action-formulaire">
                        <a href="liste-admin.php"><input type="button" value="Annuler" name="action-annuler-modifier"></a>
                        <input type="submit" value="Enregistrer" name="action-modifier-item">
                    </div>
                </fieldset>
            </form>
        </section>
    </body>
</html>