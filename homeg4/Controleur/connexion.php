<?php

if(isset($_GET['cible']) && $_GET['cible']=="verif")

{
	if (isset($_POST['formconnexion'])) 
	{
		$mailconnect = htmlspecialchars($_POST['mailconnect']);
		$mdpconnect = sha1($_POST['mdpconnect']);

		if (!empty($mailconnect) AND !empty($mdpconnect))
		{
			$reponse = connect($bdd, $mailconnect, $mdpconnect);

			if ($reponse->rowcount()==0)
			{
				$erreur= "Utilisateur inconnu";
				$test = $erreur[1];
				include("vue/connexion_erreur.php");
			}
			else
			{
				$userinfo = $reponse->fetch();

				$reponse = readconnexion($bdd, $mailconnect);
				$data = $reponse -> fetch();

				if ($mdpconnect != $userinfo['mdp']) 
				{
					$erreur = "Mot de passe incorrect";
					include("vue/connexion_erreur.php");
				}
				
				elseif ($userinfo['id'] == 7) 
				{
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['mail'] = $userinfo['mail'];
					include("vue/home_admin.php");
				}
				else
				{
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['mail'] = $userinfo['mail'];
					include("vue/home.php");
				}
			}
		}
		else
		{
			$erreur = "Veuillez remplir tous les champs !";
			include("vue/connexion_erreur.php");
		}
	}

	elseif (isset($_POST['bouton_inscription'])) 
	{	
		include("vue/page_inscription.php");
	}
}
elseif(isset($_GET['cible']) && $_GET['cible']=="cguA")
{

}
else
{
	include("vue/page_connexion.php");
}


?>