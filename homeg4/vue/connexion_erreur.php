<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = '<div class="titre_bienvenue_erreur">';
    $contenu .= '<h2> Oups ! Un petit trou de mémoire ?</h2>';
    $contenu .= '<h3> Veuillez renseigner votre identifiant et mot de passe.</h3>';
    $contenu .= '</class>';
    $contenu .= '<div id="msg_erreur"';
    $contenu .= $erreur;
    $contenu .='</div>';
    $pied = pied();

    include 'gabarit.php';
?>