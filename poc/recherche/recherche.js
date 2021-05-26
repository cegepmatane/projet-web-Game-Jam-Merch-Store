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
  httpRequest.open('GET', url + "?q=" + str, true);
  httpRequest.filepath = url;
  httpRequest.send();
}

function listeItem(){

  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      alert(httpRequest.responseText);
    } else {
      alert('Il y a eu un problème avec la requête.');
    }
  }
}
/*
    console.log("1");
    for (var i = 0; i < document.getElementByTagName('nom').length; i++) {
    document.getElementByTagName('nom').values('nom');
    console.log("2");
  }
}
if(httpRequest.readyState == 4 && httpRequest.status == 200){
  document.getElementById("barre-de-recherche").innerHTML = this.responseText;
}
}*/

function afficherItemRechercher(){

}
