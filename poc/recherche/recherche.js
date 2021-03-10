var httpRequest;

document.getElementById("barre-de-recherche").addEventListener("change", makeRequest);
var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";

function makeRequest() {
  httpRequest = new XMLHttpRequest();

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance de XMLHTTP');
    return false;
  }
  console.log("1");
  reponse=httpRequest.responseText;
  httpRequest.onreadystatechange = listeItem;
  httpRequest.open('GET', url, true);
  httpRequest.send();
}

function listeItem(){
  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      alert(httpRequest.responseText);
    } else {
      alert('Il y a eu un problème avec la requête.');
    }
    console.log("1");
    for (var i = 0; i < httpRequest.responseText.getElementByTagName('nom').length; i++) {
    httpRequest.responseText.getElementByTagName('nom').values('nom');
    console.log("2");
  }
  }
}

function afficherItemRechercher(){

}
