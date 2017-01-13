<?php
	require("connexion_base.php");


	function insertcapteur($bdd, $id_piece, $capteur, $type)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(id_piece, capteur, type) VALUES (?, ?, ?)');
		$reponse -> execute(array($id_piece, $capteur, $type));
		return $reponse;
	}

	function insertcapteur2($bdd, $n_serie,)
	{
		$reponse = $bdd -> prepare('INSERT INTO capteurs(n_serie) VALUES (?)');
		$reponse -> execute(array($n_serie,));
		return $reponse;
	}
?>