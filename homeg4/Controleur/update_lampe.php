<?php
include_once('modele/update_lampe.php');

if (isset($_POST['rafraichir'])) 
    {
    	if (isset($_POST['onoffswitch'])) 
	    {
	    	
	    	$reponse = read_lampe($bdd);
	    	while ($data = $reponse-> fetch()) 
	    	{
	    		$id_capteur = $data['capteurs.id'];
	    		
	    		$reponse = update_lampe_on($bdd, $id_capteur);
	    	}
	    }
	    else
	    {
	    	$reponse = read_lampe($bdd);
	    	while ($data = $reponse-> fetch()) 
	    	{
	    		$id_capteur = $data['capteurs.id'];
	    		
	    		$reponse = update_lampe_off($bdd, $id_capteur);
	    	}
	    }
    }

?>