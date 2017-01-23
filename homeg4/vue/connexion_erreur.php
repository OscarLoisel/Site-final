<?php
    $entete = enteteConnexion();
    $aside = asideHorsConnexion();
    $contenua = '<div class="titre_bienvenue_erreur">';
    $contenua .= '<h2> Oups ! <br /> Un petit trou de mémoire ?</h2>';
    $contenua .= $erreur;
    $contenua .= '<p>Veuillez renseigner votre identifiant et mot de passe.</p>';
    $contenua .='</div>';
    $pied = pied();

    include 'gabarit_accueil.php';
?>