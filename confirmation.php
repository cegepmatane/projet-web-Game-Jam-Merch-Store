<?php

include "include/configuration.php";
require CHEMIN_ACCESSEUR."MembreDAO.php";

    if(isset($_GET['id'], $_GET['key']) AND !empty($GET['id']) AND !empty($_GET['key'])){
        $id = htmlspecialchars(urldecode($_GET['id']));
        $key = htmlspecialchars($_GET['key']);

        $requete = MembreDAO::selectId($id, $key);
        $userexist = $requete->rowCount();

        if($userexist == 1) {
            $user = $requete->fetch();
            if($user['confirme'] == 0)
            {
                echo "Votre compe a bien ete confirme !";
            } else {
                echo "Votre compe a deja ete confirme !";
            }
        } else {
            echo "L'utilisateur n'existe pas !";
        }
    }
?>