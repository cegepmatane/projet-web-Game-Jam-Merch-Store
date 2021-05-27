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
  httpRequest.send();
}

function listeItem(){

  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      alert(httpRequest.responseText);

      var strXML = httpRequest.responseText;
      var parser = new DOMParser();
      var doc = parser.parseFromString(strXML, 'text/xml');
    }

    var x = doc.getElementsByTagName("item");
    var contenue = "<div>" +
    '   <a href="item.php?id="' +
    x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue +
    '"><img src=./img/item1.png></a>' +
    '   <p>' +
    x[i].getElementsByTagName("nom")[0].childNodes[0].nodeValue +
    '</p>\n' +
    '   <span>' +
    x[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue +
    '$</span>' +
    '</div>';
    for (i = 0;i < x.length; i++)
    {
      document.getElementById("content").innerHTML = contenue ;
    }
  } else {
        alert('Il y a eu un problème avec la requête.');
    }
}

/*
<div>
    <a href="item.php?id=<?php echo $item['id']; ?>"><img src='./img/item1.png'></a>
    <p><?php echo $item['nom']; ?></p>
    <span><?php echo $item['prix']; ?>$</span>
</div>
*/
