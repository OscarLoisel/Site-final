function test()
{
	var x = document.getElementById('nb_capteur').value;
	if(x == 2)
	{
		alert(x);
		document.getElementById('test3').innerHTML += '<tr>';
		document.getElementById('test3').innerHTML += '<td>';
		document.getElementById('test3').innerHTML += '<label for="ajout_capteur">Ajouter un capteur :</label>';
		document.getElementById('test3').innerHTML += '</td>';
		document.getElementById('test3').innerHTML += '<td>';
		document.getElementById('test3').innerHTML += '<input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série">';
		document.getElementById('test3').innerHTML += '</td>';
		document.getElementById('test3').innerHTML += '</tr>';
		document.getElementById('test3').innerHTML += '<tr>';
		document.getElementById('test3').innerHTML += '<td>';
		document.getElementById('test3').innerHTML += '<input type="submit" value="Ajouter" name="formparapieces"></td>';
		document.getElementById('test3').innerHTML += '</td>';
		document.getElementById('test3').innerHTML += '</tr>';
	}
}

function test2()
{
	var x = document.getElementById('nb_capteur').value;
	
	if(x == 2)
	{
		document.getElementById('parametrage').innerHTML = '<form method="POST" action=""><table id="tableau_parametrage_pieces"><tr><td><label for="nb_capteur">Combien de capteurs voulez vous ajouter ?</label></td><td><select name="nb_capteur" id="nb_capteur" onchange="test2()"><option value="1">1</option><option value="2" selected = "selected">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td></tr><tr><td><label for="ajout_piece">Ajouter une piéce :</label></td><td><input type="text" name="ajout_piece" id="ajout_piece" placeholder="nom de la salle"></td></tr><tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr><tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr></table><input type="radio" name="age" value="logo1" id="logo1"/> <label for="logo1"><img src ="images/salon.png" alt="salon"></label><br /><input type="radio" name="age" value="logo2" id="logo2"/> <label for="logo2"><img src ="images/cuisine.png" alt="cuisine"></label><br /><input type="radio" name="age" value="logo4" id="logo4"/> <label for="logo4"><img src ="images/Salle à manger.png" alt="couvert"></label><input type="radio" name="age" value="logo5" id="logo5"/> <label for="logo5"><img src ="images/toilettes.png" alt="toilettes"></label><input type="radio" name="age" value="logo3" id="logo3"/> <label for="logo3"><img src ="images/lit.png" alt="lit"></label><br /><input type="radio" name="age" value="logo6" id="logo6"/> <label for="logo6"><img src ="images/chambre_enfant.png" alt="chambre_enfant"></label><input type="radio" name="age" value="logo7" id="logo7"/> <label for="logo7"><img src ="images/chambre_bebe.png" alt="bebe"></label><br /><input type="submit" value="Ajouter" name="formparapieces2">';
		//document.getElementById('parametrage').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr>';
		//document.getElementById('parametrage').innerHTML += '<tr><td><input type="submit" value="Ajouter" name="formparapieces2"></td></tr>';

		// bouton --> <tr><td><input type="submit" value="Ajouter" name="formparapieces2"></td></tr>
		// n°_serie --> <tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr>
		/* choix logo --> <input type="radio" name="age" value="logo1" id="logo1"/> <label for="logo1"><img src ="images/salon.png" alt="salon"></label><br /><input type="radio" name="age" value="logo2" id="logo2"/> <label for="logo2"><img src ="images/cuisine.png" alt="cuisine"></label><br /><input type="radio" name="age" value="logo4" id="logo4"/> <label for="logo4"><img src ="images/Salle à manger.png" alt="couvert"></label><input type="radio" name="age" value="logo5" id="logo5"/> <label for="logo5"><img src ="images/toilettes.png" alt="toilettes"></label><input type="radio" name="age" value="logo3" id="logo3"/> <label for="logo3"><img src ="images/lit.png" alt="lit"></label><br /><input type="radio" name="age" value="logo6" id="logo6"/> <label for="logo6"><img src ="images/chambre_enfant.png" alt="chambre_enfant"></label><input type="radio" name="age" value="logo7" id="logo7"/> <label for="logo7"><img src ="images/chambre_bebe.png" alt="bebe"></label>*/
	}
	else if(x == 3)
	{
		document.getElementById('test3').innerHTML = '<table class="paraPieceTest"><tr><td><label for="ajout_capteur2">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur2" id="ajout_capteur2" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur3">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur3" id="ajout_capteur3" placeholder="n° de série"></td></tr><tr><td><input type="submit" value="Ajouter" name="formparapieces3"></td></tr></table>';
		//document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr></table>';
	}
	else if(x == 4)
		{
		document.getElementById('test3').innerHTML = '<table class="paraPieceTest"><tr><td><label for="ajout_capteur2">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur2" id="ajout_capteur2" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur3">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur3" id="ajout_capteur3" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur4">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur4" id="ajout_capteur4" placeholder="n° de série"></td></tr><tr><td><input type="submit" value="Ajouter" name="formparapieces4"></td></tr></table>';
		//document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr><br />';
		//document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr></table>';
		}	
	
	else if(x == 5)
		{
			document.getElementById('test3').innerHTML = '<table class="paraPieceTest"><tr><td><label for="ajout_capteur2">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur2" id="ajout_capteur2" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur3">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur3" id="ajout_capteur3" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur4">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur4" id="ajout_capteur4" placeholder="n° de série"></td></tr><br /><tr><td><label for="ajout_capteur5">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur5" id="ajout_capteur5" placeholder="n° de série"></td></tr><tr><td><input type="submit" value="Ajouter" name="formparapieces5"></td></tr></table>';
			/*document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr><br />';
			document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr><br />';
			document.getElementById('test3').innerHTML += '<tr><td><label for="ajout_capteur">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur" id="ajout_capteur" placeholder="n° de série"></td></tr></table>';*/
		}
	else
		{
			document.getElementById('test3').innerHTML = '<table class="paraPieceTest"><tr><td><input type="submit" value="Ajouter" name="formparapieces1"></td></tr></table>';
		}
	

}