<?php
include_once("controleur/update_chauffage.php");

    $moyenne_temp = moyenne_temperature($bdd,$_SESSION['id']);
    $moyenne_hum = moyenne_humidite($bdd,$_SESSION['id']);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);
    
    $entete = entete("home");
    $aside = aside("sav",$moyenne_temp,$moyenne_hum,$nb_alarme);
    $contenuc = listecapteurchauffage($moyenne_temp);
    $pied = pied();
    
    include('gabarit_capteur.php');
?>
