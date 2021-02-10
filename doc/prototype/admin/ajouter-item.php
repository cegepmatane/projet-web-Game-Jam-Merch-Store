<?php 

//Recevoir la collection où ajouter avec GET

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
            <form method="post" id="formulaire-item" action="liste-admin.php">
                <fieldset>
                    <legend>Informations sur le produit:</legend>
                    <!-- <label for="collection-item">Inclure dans quelle collection ?</label> -->
                    <input type="hidden" id="id-collection" name="id-collection" value="<?php ?>">
                    
                    <div id="bloc-item">
                        <div id="informations-item">
                            <label for="nom-item">Nom</label>
                            <input type="text" id="nom-item" name="nom-item">
    
                            <label for="prix-item">Prix</label>
                            <input type="text" id="prix-item" name="prix-item">
                    
                            <select name="type-item" id="type-item">
                                <option value="">Type de produit</option>
                                <option value="vetement">Vêtement</option>
                                <option value="tasse">Tasse</option>
                                <option value="tableau">Tableau</option>
                                <option value="ballon">Ballon</option>
                                <option value="coque-telephone">Coque de téléphone</option>
                            </select>
    
                            <label for="description-item">Description</label>
                            <textarea id="description-item" name="description-item" placeholder="Décrire brièvement l'article" cols="45" rows="10"></textarea>
                        </div>
    
                        <div id="options-item">
                            <input type="file" name="image-item" id="image-item" accept="image/*">
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
                        <input type="submit" value="Enregistrer" name="action-ajouter-item">
                    </div>
                </fieldset>
            </form>
        </section>
    </body>
</html>