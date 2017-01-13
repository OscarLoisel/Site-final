<?php

    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = "<h1> Bienvenue sur le site d'Homeg4 !</h1>";
    $contenu .= '<h2> Veuillez renseigner votre mail et mot de passe.</h2>';
    $pied = pied();

    include 'gabarit.php';
?>
