<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenua = '<div class="titre_bienvenue_success">';
    $contenua .= '<h2>Inscription réussie !</h2>';
    $contenua .= $erreur;
    $contenua .= '<p>Veuillez vous connecter !</p>';
    $contenua .='</div>';
    $pied = pied();

    include 'gabarit_accueil.php';
?>