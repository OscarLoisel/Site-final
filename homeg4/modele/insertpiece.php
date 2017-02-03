<?php
	require("connexion_base.php");

	function insertpiece($bdd, $piece, $id, $type)
	{
		$reponse = $bdd -> prepare('INSERT INTO pieces(piece,id_utilisateur,type_piece) VALUES (?, ?, ?)');
		$reponse -> execute(array($piece, $id,$type));
	}
	
?>