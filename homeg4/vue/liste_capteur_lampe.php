<?php
include_once("controleur/update_lampe.php");

    $entete = entete("home");
    $aside = aside("sav");
    
    $contenuc = listecapteurlampe();

    $pied = pied();
    
    include('gabarit_capteur.php');
?>
