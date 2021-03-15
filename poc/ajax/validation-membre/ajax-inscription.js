var url="http://localhost/projet-web/poc/ajax/validation-membre/traitement-ajax-inscription.php";

function initialiser()
{
  var elementsAjax = document.getElementsByClassName("ajax-inscription");
  
  Array.from(elementsAjax).forEach(element => {
    element.addEventListener('focusout', verifierChamp);
    //Remise à zéro de la couleur de la bordure dès qu'on entre dans le champ
    element.addEventListener('focusin',  reinitialiserBordure);
  });
}

function verifierChamp(evenement) 
{
  var element = evenement.target;
  //Pas besoin de lancer une requête au serveur si le champ est vide
  if(element.value == "") { return; }

  var requeteHTTP = new XMLHttpRequest();
  if(element.id == "mot_de_passe_confirmation")
  {
    
  }
  else
  {
    requeteHTTP.onreadystatechange = function ()
    {
      if (this.readyState == 4)
      {
        if(this.status == 200) 
          //Changement de la couleur de la bordure selon la réponse du serveur (1: existe, 0: n'existe pas)
          element.style.borderColor = (requeteHTTP.responseText == 1) ? "#d60000" : "#00cc00";
        else 
          console.log("Erreur: la requête n'a pas abouti.");
      }
    }
  }
  //Envoi de la valeur du champ au serveur
  requeteHTTP.open("GET", url + "?valeur-champ=" + evenement.target.value, true);
  requeteHTTP.send();
}

function reinitialiserBordure(evenement){
  evenement.target.style.borderColor = "grey";
}


document.addEventListener("DOMContentLoaded", initialiser);

