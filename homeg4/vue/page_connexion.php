<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1>Bienvenue chez vous <br /> où que vous soyez !</h1> ";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit_accueil.php';
?>
