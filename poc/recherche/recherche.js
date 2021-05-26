var httpRequest;

document.getElementById("barre-de-recherche").addEventListener("change", makeRequest);
var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";

function makeRequest(url) {
  httpRequest = new XMLHttpRequest();

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance de XMLHTTP');
    return false;
  }
  console.log("1");
  httpRequest.onreadystatechange = listeItem;

  var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";
  var str = document.getElementById("barre-de-recherche").value;

  httpRequest.open('GET', url + "?q=" + str, true);
  console.log(str);
  console.log(url+"?q="+str);
  //httpRequest.filepath = url;
  httpRequest.send();
}

function listeItem(){

  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      alert(httpRequest.responseText);
      afficherItemRechercher();
    } else {
      alert('Il y a eu un problème avec la requête.');
    }
  }
}

function afficherItemRechercher(){

}
