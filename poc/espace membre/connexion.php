<?php
session_start();
require "MembreDAO.php";

if(isset($_POST['formConnexion'])){

    $filterMembre = array();
    $filterMembre['mail'] = FILTER_SANITIZE_STRING;
    $filterMembre['motdepasseConnect'] = FILTER_SANITIZE_STRING;
    $membre = filter_input_array(INPUT_POST, $filterMembre);

    
    $membre['mail'] = htmlspecialchars($membre['mail']);
    // $membre['motdepasseConnect'] = $membre['motdepasseConnect'];  

    if(!empty($membre['motdepasseConnect']) AND !empty($membre['mail'])){
        $user = MembreDAO::validerConnexion($membre);
        if(!empty($user['id'])){
            if(password_verify($membre['motdepasseConnect'], $user['motdepasse'])){
                $_SESSION['id'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['mail'] = $user['mail'];
                $_SESSION['motdepasse'] = $user['motdepasse'];
                header("Location: index.php?id=".$_SESSION['id']); //redirection sur la page de notre choix avec l'id de session
            } else {
                $erreur = "Votre mot de passe est incorrect !";
            }
        } else {
            $erreur = "L'utilisateur semble etre inexistant !";
        }
    } else {
        $erreur = "Tous les champs doivent etre completes !";
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

            <h2>Connexion</h2>

            <form method="POST" action ="">
                <table>
                    <tr>
                        <td align="right"><label for="mail">Mail :</label></td>
                        <td><input type="email" placeholder="Mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="motdepasse">Mot de passe :</label></td>
                        <td><input type="password" placeholder="Votre mot de passe" name="motdepasseConnect"/></td>
                    </tr>
                    <tr>
                        <br/>
                        <td></td>
                        <td align="center"><input type="submit" name="formConnexion" value="se connecter"/></td>
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