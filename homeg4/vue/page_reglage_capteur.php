<?php

$entete = entete("home");
$aside = aside("sav");
$contenu = '<h1>Réglages</h1>';
$contenu .= listecapteurs();

// NOM_CAPTEURS - DONNEES DU CAPTEURS - BATTERIE DU CAPTEURS - VERT - ORANGE - ROUGE

$pied = pied();

include('gabarit.php');
?>
