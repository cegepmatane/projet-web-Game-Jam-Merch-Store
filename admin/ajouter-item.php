<?php 

$id_collection = filter_input(INPUT_GET, 'id_collection');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajouter un produit promotionnel</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!--HEADER-->
        <header>
            <div>
                <h1>Ajouter un produit promotionnel</h1>
                <h4>Remplissez le formulaire pour ajouter un objet à la base de données</h4>
            </div>
        </header>

        <!--MAIN-->
        <section class="contenu-page">
            <form method="POST" id="formulaire-item" action="traitement-ajout.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Informations sur le produit:</legend>

                    <input type="hidden" id="id-collection" name="id-collection" value="<?php echo $id_collection; ?>">
                    
                    <div id="bloc-item">
                        <div id="informations-item">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom">
    
                            <label for="prix">Prix</label>
                            <input type="text" id="prix" name="prix">
                    
                            <select name="type" id="type">
                                <option value="">Type de produit</option>
                                <option value="vetement">Vêtement</option>
                                <option value="tasse">Tasse</option>
                                <option value="tableau">Tableau</option>
                                <option value="ballon">Ballon</option>
                                <option value="coque-telephone">Coque de téléphone</option>
                            </select>
    
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Décrire brièvement l'article" cols="45" rows="10"></textarea>
                        </div>
    
                        <div id="options">
                            <input type="file" name="image" id="image" accept="image/*">
                            <ul id="tailles">
                                <label>Taille</label>
                                <li><input type="radio" value="xs" name="taille">XS</li>
                                <li><input type="radio" value="s" name="taille">S</li>
                                <li><input type="radio" value="m" name="taille">M</li>
                                <li><input type="radio" value="l" name="taille">L</li>
                                <li><input type="radio" value="xl" name="taille">XL</li>
                                <li><input type="radio" value="xxl" name="taille">XXL</li>
                            </ul>
                        </div>
                    </div>

                    <div id="action-formulaire">
                        <a href="liste-admin.php"><input type="button" value="Annuler" name="action-annuler-ajouter"></a>
                        <input type="submit" value="Enregistrer" name="action-ajouter">
                    </div>
                </fieldset>
            </form>
        </section>
    </body>
</html>