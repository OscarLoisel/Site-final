<?php
function insert_newss($bdd, $pseudo, $titre, $message)
{
$req = $bdd->prepare('INSERT INTO news (pseudo, titre, message) VALUES(?, ?, ?)');
$req->execute(array($pseudo, $titre, $message));

}
?>