var url="http://localhost/projet-web/poc/ajax/validation-membre/traitement-ajax-inscription.php";
var divErreurInscription;
var erreurs;

function initialiser()
{
  erreurs = new Map();
  divErreurInscription = document.getElementById("erreur-inscription")
  var elementsAjax = document.getElementsByClassName("ajax-inscription");
  
  Array.from(elementsAjax).forEach(element => {
    element.addEventListener('focusout', verifierChamp);
    //Remise à zéro de la couleur de la bordure dès qu'on entre dans le champ
    element.addEventListener('focusin',  reinitialiserBordure);
  });
}

function reinitialiserBordure(evenement)
{
  evenement.target.style.borderColor = "grey";
}

function verifierChamp(evenement) 
{
  var element = evenement.target;
  //Pas besoin de lancer une requête au serveur si le champ est vide
  if(element.value == "") { return; }
  
  var requeteHTTP = new XMLHttpRequest();

  if(element.id == "mot_de_passe_confirmation" || element.id == "mot_de_passe")
  {
    verifierMotDePasse();
    verifierErreur();
  }
  else
  {
    requeteHTTP.onreadystatechange = function(){ 
      if (this.readyState == 4)
      {
        if(this.status == 200) 
        {
          //Changement de la couleur de la bordure selon la réponse du serveur (1: existe, 0: n'existe pas)
          if(this.responseText == 1)
          {
            element.style.borderColor = "#d60000";
            erreurs.set(element.id, "Le " + element.id + " est déjà utilisé.");
          }
          else
          {
            element.style.borderColor = "#00cc00";
            erreurs.delete(element.id);
          }
        }
        else
        { 
          console.log("Erreur: la requête n'a pas abouti.");
        }
        verifierErreur();
      }
    };
  }
  //Envoi de la valeur du champ au serveur
  requeteHTTP.open("GET", url + "?valeur-champ=" + evenement.target.value, true);
  requeteHTTP.send();
}

function verifierMotDePasse()
{
  var champMotDePasse = document.getElementById("mot_de_passe");
  var champMotDePasseConfirmation = document.getElementById("mot_de_passe_confirmation");

  if(champMotDePasse.value == champMotDePasseConfirmation.value)
  {
    champMotDePasse.style.borderColor = champMotDePasseConfirmation.style.borderColor = "#00cc00";
    erreurs.delete("mot_de_passe");
  }
  else
  {
    champMotDePasse.style.borderColor = champMotDePasseConfirmation.style.borderColor = "#d60000";
    erreurs.set("mot_de_passe", "Les mots de passe doivent correspondre.");
  }
}

function verifierErreur()
{
  //N'affiche pas la div d'erreur tant que les erreurs ne sont pas renseignées
  divErreurInscription.innerHTML = "";
  divErreurInscription.style.display = "none";

  if(erreurs.size != 0)
  {
    divErreurInscription.innerHTML += "<ul>";
    for (let valeur of erreurs.values()) 
    { 
      divErreurInscription.innerHTML += "<li>"+valeur+"</li>";
     }
    divErreurInscription.innerHTML += "</ul>";

    divErreurInscription.style.display = "block";
    document.getElementById("action-inscription").disabled = true;
  }
  else
  {
    divErreurInscription.style.display = "none";
    document.getElementById("action-inscription").disabled = false;
  }
}

document.addEventListener("DOMContentLoaded", initialiser);