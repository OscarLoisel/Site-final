<?php
	require("connexion_base.php");

	function editmail($bdd, $mail, $id)
	{
		$reponse = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE id = ?");
		$reponse->execute(array($mail, $id));
	}

	function editmdp($bdd, $mdp, $id)
	{
		$reponse= $bdd->prepare("UPDATE utilisateur SET mdp = sha1(?) WHERE id = ?");
		$reponse -> execute(array($mdp, $id));
	}

?>

