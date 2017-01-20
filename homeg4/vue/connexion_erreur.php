<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = '<div class="titre_bienvenue_erreur">';
    $contenu .= '<h2> Oups ! <br /> Un petit trou de mémoire ?</h2>';
    $contenu .= '<p>Veuillez renseigner votre identifiant et mot de passe.</p>';
    $contenu .= '</class>';
    /*$contenu .= '<div id="msg_erreur"';
    $contenu .= $erreur;
    $contenu .='</div>';*/
    $pied = pied();

    include 'gabarit_accueil.php';
?>