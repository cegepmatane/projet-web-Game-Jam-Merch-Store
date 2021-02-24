<?php 
use PHPMailer\PHPMailer\PHPMailer;
require('PHPMailer/PHPMailer.php');
require('PHPMailer/Exception.php');
require('PaypalIPN.php');
$ipn = new PaypalIPN();

// Use the sandbox endpoint during testing.
$ipn->useSandbox();

$verified = $ipn->verifyIPN();
if ($verified) {

    $clientEmail = $_POST['payer_email'];
    $nom = $_POST['first_name'] . " " . $_POST['last_name'];

    $prix = $_POST['mc_gross'];
    $monnaie = $_POST['mc_currency'];
    $item = $_POST['item_number'];
    $Status = $_POST['payment_status'];

    $mail = new PHPMailer();

    $mail->setFrom( "ventes@promotemyjam.store", "Service de Ventes En ligne - promotemyjam");
    $mail->addAddress($_POST['payer_email'], $nom);
    $mail->isHTML(true);
    $mail->Subject = "Vos détails d'achat";
    $mail->Body = "Bonjour $nom,<br><br>
    Merci pour votre achat sur notre site. Voici la facture concernant votre transaction : <br>
        $item - $prix $monnaie";
    $mail->send();
}

// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
header("HTTP/1.1 200 OK");