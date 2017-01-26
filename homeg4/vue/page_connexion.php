<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenua = '<div class="titre_bienvenue">';
    $contenua .= "<h1>Bienvenue chez vous <br /> où que vous soyez !</h1> ";
    $contenua .= '</div>';
    $pied = pieda();

    include 'gabarit_accueil.php';
?>
