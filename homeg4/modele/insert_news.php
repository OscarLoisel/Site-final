<?php
function insert_newss($bdd, $titre, $message)
{
$req = $bdd->prepare('INSERT INTO news (titre, message) VALUES(?, ?)');
$req->execute(array($titre, $message));

}
?>