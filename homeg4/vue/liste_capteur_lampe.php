<?php
include_once("controleur/update_lampe.php");
    $moyenne_temp = round(moyenne_temperature($bdd,$_SESSION['id']),1);
    $moyenne_hum = round(moyenne_humidite($bdd,$_SESSION['id']),1);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

    $entete = entete("home");
    $aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);
    $contenuc = listecapteurlampe();
    $contenuc .= $msg;
    $pied = pied();
    
    include('gabarit_capteur.php');
?>
