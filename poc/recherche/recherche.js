var httpRequest;
  console.log("2");
  document.getElementById("barre-de-recherche").addEventListener("change", makeRequest);
  var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";

  console.log("2");


  function makeRequest() {
    httpRequest = new XMLHttpRequest();

    console.log("2");
    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance de XMLHTTP');
      return false;
    }
    console.log("1");
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
      console.log("1");
      for (var i = 0; i < response.getElementByTagName('nom').length; i++) {
      response.getElementByTagName('nom').values('nom');
      console.log("2");
    }
    }
  }

  function afficherItemRechercher(){

  }
