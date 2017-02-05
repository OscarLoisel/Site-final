<?php
	require("connexion_base.php");

	function select_scenario($bdd, $id)
		{
			$reponse= $bdd->prepare("SELECT * FROM scenario WHERE id = ?");
		    $reponse->execute(array($id));
		    return $reponse;
		}
?>