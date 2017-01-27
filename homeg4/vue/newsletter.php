<?php

    $entete = entete("Newsletter");
    $aside = aside("Newsletter");
    $contenu = '<div class="titre_bienvenue">';
    $contenu .= "<h1> NewsLetter 01/12/16 </h1>";
	$contenu .="<p> Bienvenue sur la première monture du nouveau site d'HOMEG4. </p>";
	$contenu .="<p>Ce site destiné à aider nos utilisateur à obtenir des informations sur leurs maisons connecté sera bientôt finalisé et disponible pour le plus grand monde.</p>";
	$contenu .="<p> Vous pourrez retrouver ici toutes les annonces de nos mises à jour du site et d'autres informations importantes. </p>";
	$contenu .="<p> Pour être sûr d'être mis au courant, vous pouvez vous vous inscrire à notre liste mail pour recevoir immédiatement sur votre adresse tous nos messages.</p>";
    $contenu .= '</div>';
    $pied = pied();

    include 'gabarit.php';
?>


 <div class="corps">
    <section id="Inscrip">
		<form method="POST" action="">
		<table id="Bdd">
			<tr>
				<td>
					<label for="mail" class="text"> Votre adresse mail: </label> 
				</td>
				<td>
					<input type="text" name="mail" placeholder="" >
				</td>
			</tr>


			<tr>
				<td>
					<input type="submit" name="formconnexion" value="send" class="bouton" >
				</td>
			</tr>


				<tr>
					<td colspan="2">
						<br/><br/>
						<div id="msg_erreur">

						<?php 
						if (isset($erreur)) 
						{ 
							echo '<font color="red">'.$erreur.'</font>';
						}

						?>
						</div>
					</td>
				</tr>
			

		</table>
		</form>
	</section>
	</div>


