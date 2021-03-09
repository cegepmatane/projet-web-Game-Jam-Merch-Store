<?php

include "include/configuration.php";
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
	}
	if (isset($_POST['bouton-courriel']))
	{

	}
	if (isset($_POST['bouton-mdp']))
	{

	}
	if (isset($_POST['action-enregistrer-adresse']))
	{

	}

	?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Page Paiement</title>
</head>
<body>
    <!--HEADER-->
    <header>
        <div>
            <h1>Profil</h1>
        </div>
    </header>
    <div id="btnr">
        <a class="bouton-retour" href="index.php"><img src="img/retour.png"></a>
    </div>

     <!--MAIN-->
    <section class="contenu-page">
        <div id="tete-profil">
            <img src="img/test.png" width="200" height="200">
            <div id="informations-compte">
			<form action="" method="post">


									<label for="nom-utilisateur"> 
						Nom d'utilisateur<input type="text" id="nom-utilisateur" name="nom-utilisateur" value="<?php if(isset($_SESSION['membre']['nom_utilisateur'])) { echo $_SESSION['membre']['nom_utilisateur']; } ?>" required>
									</label>
									
									<input type="submit" name="bouton-nom-utilisateur" value="Changer">

												</form>

									<form action="" method="post">
									<label for="courriel">
											Courriel <input type="email" id="courriel" name="courriel" value="<?php if(isset($_SESSION['membre']['courriel'])) { echo $_SESSION['membre']['courriel']; } ?>">
									</label>
									<input type="submit" name="bouton-courriel" value="Changer">

												</form>
									<form action="" method="post">
									<label for="mdp">
										 Mot de passe <input type="password" id="mdp" name="mdp">
									</label>

									<input type="submit" name="bouton-mdp" value="Changer">
												</form>
							</div>
					</div>


			</form>
        <form method="post" class="formulaire-profil" action="profil.php">
            <fieldset>
                <legend>Informations personnelles</legend>
                <div id="adresse-livraison">
                    <label for="prenom">
                        Prénom <input type="text" id="prenom" name="prenom" value="<?php if(isset($_SESSION['membre']['prenom'])) { echo $_SESSION['membre']['prenom']; } ?>">
                    </label>

                    <label for="nom">
                        Nom <input type="text" id="nom" name="nom" value="<?php if(isset($_SESSION['membre']['nom'])) { echo $_SESSION['membre']['nom']; } ?>">
					</label>

                    <label for="numero-rue">
                        Num. rue <input type="text" id="numero-rue" name="numero-rue">
					</label>

                    <label for="numero-appartement">
                        Appt/Chambre <input type="text" id="numero-appartement" name="numero-appartement">
                    </label>

                    <label for="rue">
                        Rue <input type="text" id="rue" name="rue">
                    </label>

                    <label for="ville">
                        Ville <input type="text" id="ville" name="ville">
                    </label>

                    <label for="code-postal">
                        Code postal <input type="text" id="code-postal" name="code-postal">
                    </label>

                    <label for="pays">
                        Pays <input type="text" id="pays" name="pays">
                    </label>

                    <div id="action-formulaire">
                        <input type="submit" value="Enregistrer" name="action-enregistrer-adresse">
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
</body>
</html>
<?php}require_once CHEMIN_INCLUDE."pied-page.php";
?>
