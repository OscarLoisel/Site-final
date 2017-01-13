<?php

    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1> Bienvenue chez vous où que vous soyez !</h1> ";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit.php';
?>
