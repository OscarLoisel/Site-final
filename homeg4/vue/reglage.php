<?php

$entete = entete("reglage");
$aside = asideReglage("edition_profil");


$test = recup_valeur_temp($bdd,$_SESSION["id"]);
$reponse = $test -> fetch();
echo($reponse[0]);
$contenu = "$reponse[0]";
$pied = pied();

include('gabarit.php');

?>