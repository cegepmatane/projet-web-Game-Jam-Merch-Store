<?php

include '../../../include/configuration.php';
require_once CHEMIN_ACCESSEUR."MembreDAO.php";

/*
Le serveur reçoit la valeur du champ à vérifier en AJAX,
Le DAO vérifie si un membre existe avec les informations entrées
Si oui, le serveur renvoie un valeur positive (1) sinon une valeur nulle (0)
*/

$valeurChamp = filter_input(INPUT_GET, 'valeur-champ');
$membre = MembreDAO::verifierExistant($valeurChamp);
echo (isset($membre['id'])) ? 1 : 0;
?>


