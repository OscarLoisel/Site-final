<?php
include_once("controleur/update_chauffage.php");
    
    $entete = entete("home");
    $aside = aside("sav");
    $contenuc = listecapteurchauffage();
    $pied = pied();
    
    include('gabarit_capteur.php');
?>
