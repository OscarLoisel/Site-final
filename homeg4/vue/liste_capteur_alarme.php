<?php
    
    $entete = entete("home");
    $aside = aside("sav");
    $contenuc = listecapteuralarme();
    $pied = pied();
    
    include('gabarit_capteur.php');
?>