<?php
include_once('modele/update_volet.php');

// BOUTON ALLUMER / ETEINDRE

$id_utilisateur = $_SESSION['id'];

if (isset($_POST['ouvrir'])) 
{
	$reponse = read_lampe($bdd, $id_utilisateur);
	$data = $reponse-> fetchAll();
	$data_size = sizeof($data);
	//echo 'taille :<br>'.$data_size;
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_lampe_on($bdd, $data[$i][0]);
	}
}
    
if (isset($_POST['fermer']))
{	
	$reponse = read_lampe($bdd, $id_utilisateur);
	$data = $reponse-> fetchAll();
	$data_size = sizeof($data);
	//echo 'taille :<br>'.$data_size;
	for ($i=0; $i < $data_size; $i++)   
	{
		echo $data[$i][0];
		$reponse = update_lampe_off($bdd, $data[$i][0]);
	}
	
}

?>