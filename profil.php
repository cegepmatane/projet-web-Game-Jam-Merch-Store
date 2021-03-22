<?php

include "include/configuration.php";
include CHEMIN_INCLUDE."traduction.php";
require CHEMIN_ACCESSEUR."MembreDAO.php";
/*
$_SESSION['membre']['id'] = $user['id'];
$_SESSION['membre']['prenom'] = $user['prenom'];
$_SESSION['membre']['nom_utilisateur'] = $user['nom_utilisateur'];
$_SESSION['membre']['nom'] = $user['nom'];
$_SESSION['membre']['courriel'] = $user['courriel'];
$_SESSION['membre']['mot_de_passe'] = $user['mot_de_passe'];
*/

	if (isset($_POST['bouton-nom-utilisateur']))
	{
		$id=$_SESSION['membre']['id'];
		$nouveauNomUtilisateur=$_REQUEST['nom-utilisateur'];
		$NU = MembreDAO::modifierProfilNomUtilisateur($id, $nouveauNomUtilisateur);

		$_SESSION['membre']['nom_utilisateur'] =  $nouveauNomUtilisateur;

	}

	if (isset($_POST['bouton-courriel']))
	{
		$id=$_SESSION['membre']['id'];
		$nouveauCourriel=$_REQUEST['courriel'];
		$Courriel = MembreDAO::modifierProfilCourriel($id, $nouveauCourriel);

		$_SESSION['membre']['courriel'] =  $nouveauCourriel;
	}

	if (isset($_POST['bouton-mdp']))
	{
		$id=$_SESSION['membre']['id'];
		$nouveauMotDePasse=password_hash($_REQUEST['mdp'], PASSWORD_DEFAULT);
		$MotDePasse = MembreDAO::modifierProfilMotDePasse($id, $nouveauMotDePasse);

		$_SESSION['membre']['mdp'] =  $nouveauMotDePasse;
	}

	if (isset($_POST['action-enregistrer-adresse']))
	{
		$id=$_SESSION['membre']['id'];
		$nouveauPrenom=$_REQUEST['prenom'];
		$nouveauNom=$_REQUEST['nom'];
		$Infos = MembreDAO::modifierProfilInfosPersonnelles($id, $nouveauPrenom, $nouveauNom);

		$_SESSION['membre']['prenom'] =  $nouveauPrenom;
		$_SESSION['membre']['nom'] =  $nouveauNom;
	}

	?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title><?=_("Page Profil")?></title>
</head>
<body>
    <!--HEADER-->
    <header>
        <div>
            <h1><?=_("Profil")?></h1>
        </div>
    </header>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

	<form class="traduction-form" method="post"><input class="traduction-input" type="submit" name="langue" value=<?=_("English")?>></form>

     <!--MAIN-->
    <section class="contenu-page">
        <div id="tete-profil">
            <img src="img/test.png" width="200" height="200">
            <div id="informations-compte">
				<form action="" method="post">
					<label for="nom-utilisateur"> 
					<?=_("Nom d'utilisateur")?><input type="text" id="nom-utilisateur" name="nom-utilisateur" value="<?php if(isset($_SESSION['membre']['nom_utilisateur'])) { echo $_SESSION['membre']['nom_utilisateur']; } ?>" required>
					</label>
					<input type="submit" name="bouton-nom-utilisateur" value=<?=_("Changer")?>>
				</form>

				<form action="" method="post">
					<label for="courriel">
						<?=_("Courriel")?><input type="email" id="courriel" name="courriel" value="<?php if(isset($_SESSION['membre']['courriel'])) { echo $_SESSION['membre']['courriel']; } ?>">
					</label>
					<input type="submit" name="bouton-courriel" value=<?=_("Changer")?>>
				</form>
				<form action="" method="post">
					<label for="mdp">
					<?=_("Mot de passe")?><input type="password" id="mdp" name="mdp">
					</label>
	
					<input type="submit" name="bouton-mdp" value=<?=_("Changer")?>>
				</form>
			</div>
		</div>
        <form method="post" class="formulaire-profil" action="profil.php">
            <fieldset>
                <legend><?=_("Informations personnelles")?></legend>
                <div id="adresse-livraison">
                    <label for="prenom">
                    <?=_("Prénom")?><input type="text" id="prenom" name="prenom" value="<?php if(isset($_SESSION['membre']['prenom'])) { echo $_SESSION['membre']['prenom']; } ?>">
                    </label>

                    <label for="nom">
                    <?=_("Nom")?><input type="text" id="nom" name="nom" value="<?php if(isset($_SESSION['membre']['nom'])) { echo $_SESSION['membre']['nom']; } ?>">
					</label>

                    <label for="numero-rue">
                    <?=_("Num. rue")?><input type="text" id="numero-rue" name="numero-rue">
					</label>

                    <label for="numero-appartement">
                    <?=_("Appt/Chambre")?><input type="text" id="numero-appartement" name="numero-appartement">
                    </label>

                    <label for="rue">
                    <?=_("Rue")?><input type="text" id="rue" name="rue">
                    </label>

                    <label for="ville">
                    <?=_("Ville")?><input type="text" id="ville" name="ville">
                    </label>

                    <label for="code-postal">
                    <?=_("Code postal")?><input type="text" id="code-postal" name="code-postal">
                    </label>

                    <label for="pays">
                    <?=_("Pays")?><input type="text" id="pays" name="pays">
                    </label>

                    <div id="action-formulaire">
                        <input type="submit" value=<?=_("Enregistrer")?> name="action-enregistrer-adresse">
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
</body>
</html>
<?php}require_once CHEMIN_INCLUDE."pied-page.php";
?>
