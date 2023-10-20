<?php

$nom = $_POST['nom'];
$email = $_POST['email'];
$sujet = $_POST['email'];
$message = $_POST['nom'];

$textToSend = $nom . " vous a envoyé un message (adresse mail : " . $email . ") : \n\n" . $message;

$isSent = mail('dec.legal@orange.fr', $sujet, $textToSend);
if ($isSent) {
    echo 'Email envoyé';
} else {
    echo 'Erreur';
}
?>