<?php
if(isset($_POST['langue'])){
    if ($_POST['langue'] == "Francais"){
        $_SESSION['langue'] = "fr_CA";
    }
    if ($_POST['langue'] == "English"){
        $_SESSION['langue'] = "en_CA";
    }
}

if(isset($_SESSION['langue'])) {
    $locale = $_SESSION['langue'];
} else {
    $locale = "fr_CA";
}

$domaine = "promotemyjam";

setlocale(LC_ALL,$locale);

bindtextdomain($domaine,"/var/www/www.promotemyjam.store/locale");
textdomain($domaine);
?>