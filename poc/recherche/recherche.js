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
  afficherItemRechercher();
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

function afficherItemRechercher(){

  foreach($listeItem as $item)
  {
    if (is_null($_GET['q'])) {

      <div>
          <a href="item.php?id=<?php echo $item['id']; ?>"><img src='./img/item1.png'></a>
          <p><?php echo $item['nom']; ?></p>
          <span><?php echo $item['prix']; ?>$</span>
      </div>

    }
    else if (!is_null($_GET['q'])){
      if(strpos($item['nom'], $_GET['q']) !== false){

        <div>
            <a href="item.php?id=<?php echo $item['id']; ?>"><img src='./img/item1.png'></a>
            <p><?php echo $item['nom']; ?></p>
            <span><?php echo $item['prix']; ?>$</span>
        </div>
    
      }
      }
  }
  ?>
}
