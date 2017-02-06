<?php
	require("connexion_base.php");

	function selectpiece($bdd, $id)
		{
			$reponse= $bdd->prepare("SELECT * FROM pieces WHERE id_utilisateur = ?");
		    $reponse->execute(array($id));
		    return $reponse;
		}

	function selectType($bdd,$id)
	{
		$reponse= $bdd->prepare("SELECT type_piece FROM pieces WHERE id_utilisateur = ?");
	    $reponse->execute(array($id));
	    return $reponse;	
	}

	function verif_etat_capteurs($bdd, $id_piece)
	{
		$reponse = $bdd -> prepare("SELECT etat FROM capteurs WHERE id_piece = ?");
		$reponse -> execute(array($id_piece));
		return $reponse;
	}
?>