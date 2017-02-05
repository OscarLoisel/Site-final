<?php


$entete = entete("scenario");
//$aside = asideReglage("edition_profil");
$aside = asideReglage("scenarios");

$contenu = "<div id='grille_pieces'>";
try 
    {
        $reponse = select_scenario($bdd, $_SESSION['id']);
        //while ($data = $reponse->fetch(); TRANSFORMER 
        $data = $reponse->fetchAll();
        $nbrligne = sizeof($data);
        for ($i= 0; $i < $nbrligne ; $i++) 
        {
            if($nbrligne != 0)
            {
            	echo($data[0]);
            }
        }
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }




$pied = pied();

include('gabarit.php');

?>