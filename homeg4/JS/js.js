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
		document.getElementById('test3').innerHTML = '<tr><td></td><td><label for="ajout_capteur2">Ajouter un capteur :</label></td><td><input type="text" name="ajout_capteur2" id="ajout_capteur2" placeholder="n° de série"></td></tr><br /><tr><td><input type="submit" value="Ajouter" name="formparapieces2"></td></tr>';
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