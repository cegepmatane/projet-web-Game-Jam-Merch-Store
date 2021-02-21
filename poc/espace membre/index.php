<?php

require "MembreDAO.php";

if(isset($_POST['forminscription'])){

    $filterMembre = array();
    $filterMembre['prenom'] = FILTER_SANITIZE_STRING;
    $filterMembre['nom'] = FILTER_SANITIZE_STRING;
    $filterMembre['mail'] = FILTER_SANITIZE_STRING;
    $filterMembre['motdepasse'] = FILTER_SANITIZE_STRING;
    $filterMembre['motdepasse2'] = FILTER_SANITIZE_STRING;
    $membre = filter_input_array(INPUT_POST, $filterMembre);

    $membre['prenom'] = htmlspecialchars($membre['prenom']);
    $membre['nom'] = htmlspecialchars($membre['nom']);
    $membre['mail'] = htmlspecialchars($membre['mail']);
    $membre['motdepasse'] = password_hash($membre['motdepasse'], PASSWORD_DEFAULT);

    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['motdepasse']) AND !empty($_POST['motdepasse2'])){
        if(strlen($membre['prenom']) <= 255){
            if(strlen($membre['nom']) <= 255){
                if(filter_var($membre['mail'], FILTER_VALIDATE_EMAIL)){
                    if(password_verify($membre['motdepasse2'], $membre['motdepasse'])){
                        $reussiteAjout = MembreDAO::enregistrerMembre($membre);
                    } else {
                        $erreur = "Les mots de passe doivent correspondres !";
                    }
                } else {
                    $erreur = "Votre mail n'est pas valide";
                }
            } else {
                $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
            }

        } else {
            $erreur = "Votre prénom ne doit pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés ! ";
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Espace membre</title>
        <meta charset="utf-8">
    </head>
    <body>


        <div align="center">

            <h2>Inscription</h2>

            <form method="POST" action ="">
                <table>
                    <tr>
                        <td align="right"><label for="Prenom">Prenom :</label></td>
                        <td><input type="text" placeholder="Votre prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="nom">Nom :</label></td>
                        <td><input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="mail">Mail :</label></td>
                        <td><input type="email" placeholder="Votre mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="motdepasse">Mot de passe :</label></td>
                        <td><input type="password" placeholder="Votre mot de passe" name="motdepasse"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="motdepasse2">Mot de passe :</label></td>
                        <td><input type="password" placeholder="Confirmez votre mot de passe" name="motdepasse2"/></td>
                    </tr>
                    <tr>
                        <br/>
                        <td></td>
                        <td align="center"><input type="submit" name="forminscription" value="inscription"/></td>
                    </tr>
                </table>
            </form>

            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
        
        </div>
    
    
    </body>
</html>