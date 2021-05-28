var httpRequest;

document.getElementById("barre-de-recherche").addEventListener("change", makeRequest);
var url="https://www.promotemyjam.store/poc/recherche/listeItemAjax.php";

function makeRequest(url) {
  httpRequest = new XMLHttpRequest();

  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance de XMLHTTP');
    return false;
  }
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
    var i;
    var x = doc.getElementsByTagName("item");
          document.getElementById("content").innerHTML = "";
    for (var i = 0;i < x.length; i++)
    {
      //console.log(x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue);
      //console.log(x[i].getElementsByTagName("nom")[0].childNodes[0].nodeValue);
      //console.log(x[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue);

      var recherchenull =
      '<div>\n'+
      '   <a href="item.php?id=<?php echo $item'+"['id']; ?>"+'"'+"><img src='./img/item1.png'></a>\n"+
      "   <p><?php echo $item['nom']; ?></p>\n"+
      "   <span><?php echo $item['prix']; ?>$</span>\n"+
      '</div>\n' +
      '<div>\n' +
      '   <a href="item.php?id=<?php echo $randomitem'+"['id']; ?>"+'"'+"><img src='.img/rand.png'></a>\n"+
      '   <p>Un nom magnifique</p>\n'
      '   <span>Pour un prix ahurissant</span>\n'
      '</div>';

      var recherchenotnull =
      '<div>\n' +
      '   <a href="item.php?id=' +
      x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue +
      '"><img src=./img/item1.png></a>\n   <p>' +
      x[i].getElementsByTagName("nom")[0].childNodes[0].nodeValue +
      '</p>\n' +
      '   <span>' +
      x[i].getElementsByTagName("prix")[0].childNodes[0].nodeValue +
      '$</span>\n' +
      '</div>';

      var recherche;

      if(x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue > 0) {
        recherche = recherchenotnull;
      }else{
        recherche = recherchenull;
      };

      document.getElementById("content").innerHTML +=
      '<?php\nforeach($listeItem as $item){\n?>' +
      recherche +
      '\n<?php\n}\n?>';

    }
    console.log(document.getElementById("content").innerHTML);
  } else {
        console.log('Il y a eu un problème avec la requête.');
    }
}
