<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenu = '<div class="titre_bienvenue_erreur">';
    $contenu .= '<h2> Oups ! <br /> Un petit trou de mémoire ?</h2>';
    $contenu .= $erreur;
    $contenu .= '<p>Veuillez renseigner votre identifiant et mot de passe.</p>';
    $contenu .='</div>';
    $pied = pied();

    include 'gabarit_accueil.php';
?>