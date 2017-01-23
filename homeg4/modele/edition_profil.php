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

	function editbouton_off($bdd, $id_piece, $type)
	{
		$reponse = $bdd->prepare("UPDATE capteurs SET etat = '1' WHERE id_piece = ? AND type = ?");
		$reponse->execute(array($mail, $id));
	}
?>

