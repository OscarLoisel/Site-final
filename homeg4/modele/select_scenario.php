<?php
	require("connexion_base.php");

	function select_scenario($bdd, $id)
		{
			$reponse= $bdd->prepare("SELECT * FROM scenarios WHERE id_utilisateur = ?");
		    $reponse->execute(array($id));
		    return $reponse;
		}
?>