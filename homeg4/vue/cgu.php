<?php

    $moyenne_temp = moyenne_temperature($bdd,$_SESSION['id']);
    $moyenne_hum = moyenne_humidite($bdd,$_SESSION['id']);
    $nb_alarme = nombre_camera_allume($bdd,$_SESSION['id']);

    $entete = entete("CGU");
    $aside = asideReglage("cgu",$moyenne_temp,$moyenne_hum,$nb_alarme);
    $contenu = mentionslegales();
    $pied = pied();

    include 'gabarit.php';
?>