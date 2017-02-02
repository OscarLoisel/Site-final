<?php
/*include_once('modele/update_lampe.php');

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
}*/
if (isset($_POST['formscenario'])) 
{
	$date_debut = htmlspecialchars($_POST['date_debut']);
	$date_fin = htmlspecialchars($_POST['date_fin']);
	if (!empty($date_debut)) 
	{
		echo "date_debut";
		if (!empty($date_fin)) 
		{
			echo "date_fin";
			if (isset($_POST['choixh']))  
			{
				$choix_h = $_POST['choixh'];
				echo $choix_h;
			}
		}
	}
}

?>