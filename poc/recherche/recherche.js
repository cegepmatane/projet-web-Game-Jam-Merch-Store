(function() {
  var httpRequest;
  document.getElementById("barre-de-recherche").keyup = makeRequest());
  var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";



  function makeRequest() {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance de XMLHTTP');
      return false;
    }
    echo("1");
    httpRequest.onreadystatechange = listeItem;
    httpRequest.open('GET', url, true);
    httpRequest.send();
  }

  function listeItem(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var response = JSON.parse(httpRequest.responseText);
        alert(httpRequest.responseText);
      } else {
        alert('Il y a eu un problème avec la requête.');
      }
      echo("1");
      for (var i = 0; i < response.getElementByTagName('nom').length; i++) {
      response.getElementByTagName('nom').values('nom');
      echo("2");
    }
    }
  }

  function afficherItemRechercher(){

  }
});
