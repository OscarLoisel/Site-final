<?php 
    session_start();
    include_once("modele/connexion_base.php"); 
    include_once("vue/commun.php");
    include_once("modele/inscription.php");
    include_once("modele/utilisateur.php");
    include_once("modele/para_capteurs.php");
    include_once("modele/insertpiece.php");
    include_once("modele/edition_profil.php");
    include_once("modele/insertcapteur.php");
    include_once("modele/insertion_tram.php");
    include_once("modele/recup_valeurs.php");
    include_once("modele/update_lampe.php");
    include_once('modele/update_chauffage.php');
    include_once("modele/recup_moyenne.php");
    include_once("modele/recup_utilisateur.php");
    include_once("modele/update_chauffage_commun.php");
    include_once("modele/select_scenario.php");
    include_once("modele/insert_news.php");

    //require("modele/para_capteurs.php");*/
    if(!isset($_SESSION["id"]))
    { 
        include("controleur/connexion.php");
    }

// INSERTION DES TRAMS DANS LA BASE DE DONNÉES

    

// FORMULAIRE INSCRIPTION
    
    if (isset($_POST['forminscription'])) 
        {
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $n_serie = htmlspecialchars($_POST['n_serie']);
        
        if (!empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['n_serie'])) 
        {

            $reponse = reqmail($bdd, $mail);
            $mailexist = $reponse-> rowCount(); 
            if ($mailexist == 0)
            {
                if ($mail == $mail2) 
                {
                    if ($mdp == $mdp2) 
                    {
                        $truc = read_n_serie($bdd, $n_serie);
                        $data = $reponse->fetch();
                        /*echo($data[0]);
                        echo($data[1]);*/
                
                        if ($truc -> rowcount() == 1) 
                        {
                            update_etat_produit($bdd, $n_serie);
                            insertutilisateur($bdd, $mail, $mdp);
                            $erreur = "Votre compte a bien été créé !";
                            include('vue/connexion_success.php');
                        }
                        else
                        {
                            $erreur="Numéro de série inexistant ou déjà utilisé";
                            include('vue/inscription_erreur.php');
                        }
                         
                    }
                    else
                    {
                        $erreur ="Les mots de passes ne correspondent pas !";
                        include('vue/inscription_erreur.php');
                    }

                }
                else
                {
                    $erreur ="Vos adresses email ne correspondent pas !";
                    include('vue/inscription_erreur.php');
                }
            }
            else
            {
                $erreur = "Cette adresse email existe déjà, veuillez en saisir une nouvelle !";
                include('vue/inscription_erreur.php');
            }
        }
        else
        {
            $erreur = "Veuillez remplir tous les champs !";
            $test = $erreur[1];
            //echo($test);
            include('vue/inscription_erreur.php');
        }

    }

// FORMULAIRE PARA PIECES 

    if (isset($_POST['formparapieces'])) 
    {
        if(!empty($_POST['ajout_piece']) AND !empty($_POST['ajout_capteur']))
        {
            $id = intval($_SESSION['id']); // id de session
            $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné

            if(!empty($_POST['logo']))
            {
                $type_piece = $_POST['logo'];
                $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
                $data = $reponse->fetch();


                $test = read_n_tram($bdd, $id);
                $test2 = $test ->fetch();

                if ($reponse -> rowcount() == 1) // si le capteur existe 
                {
                    insertpiece($bdd, $piece, $id, $type_piece); // La piece est créée
                    $id_new_piece = idNewPiece($bdd, $id);
                    $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
                    //echo($id_new_piece2[0]);
                    $data = "$data[1]";
                    $data = "$data[1]"; // == H T L P ou V
                    //echo($data); == H T L P ou V
                    if($data == "H")
                    {
                        $type = "humidite";
                        $test2 = $test2['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                        update_etat_produit($bdd,$n_serie);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data == "T")
                    {
                        $type = "temperature";
                        $test2 = $test2['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                        update_etat_produit($bdd,$n_serie);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data == "L")
                    {
                        $type = "light";
                        $test2 = $test2['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                        update_etat_produit($bdd,$n_serie);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data == "P")
                    {
                        $type = 'presence';
                        $test2 = $test2['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                        update_etat_produit($bdd,$n_serie);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data == "V")
                    {
                        $type = "volet";
                        $test2 = $test2['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $test2);
                        update_etat_produit($bdd,$n_serie);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                }
                else
                {
                    $msg = "Le numéro de série renseigné est erroné ou déjà utilisé";
                    include('vue/ajout_piece_erreur.php');
                }
            }
            else
            {
                $msg = 'Veuillez chosir un logo pour votre pièce';
                include('vue/ajout_piece_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/ajout_piece_erreur.php'); 
        }
    }

        

        

        



// -----------------------------------------------------------------------------------------------------------//


    if (isset($_POST['formparapieces2'])) 
    {
        if(!empty($_POST['ajout_piece']) AND !empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']))
        {
            $id = intval($_SESSION['id']); // id de session
            $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            if(!empty($_POST['logo']))
            {
                $type_piece = $_POST['logo'];
                $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
                $reponse2 =checkCapteur($bdd, $n_serie2);
                $data = $reponse->fetch();
                $data2 = $reponse2 -> fetch();


                $test = read_n_tram($bdd, $id);
                $n_tram = $test ->fetch();
                if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $n_serie != $n_serie2) // si le capteur existe 
                {

                    insertpiece($bdd, $piece, $id,$type_piece); // La piece est créée
                    $id_new_piece = idNewPiece($bdd, $id);
                    $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
                    //echo($id_new_piece2[0]);
                    $data = "$data[1]";
                    $data = "$data[1]"; // == H T L P ou V
                    $data2 = "$data2[1]";
                    $data2 = "$data2[1]";

                    //echo($data); == H T L P ou V
                    if($data == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }



                    if($data2 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data2 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data2 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data2 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data2 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                }
                else
                {
                    $msg = "il y a un problème avec l'un des numeros de série renseignés";
                    include('vue/ajout_piece_erreur.php');
                }
            }
            else
            {
                $msg = 'Veuillez chosir un logo pour votre pièce';
                include('vue/ajout_piece_erreur.php');
            }

        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/ajout_piece_erreur.php');
        }
        



        
        //include'vue/ajout_capteurs.php';
        
    } 


// ------------------------------------------------------------------------------------------------------//



    if (isset($_POST['formparapieces3'])) 
    {
        if(!empty($_POST['ajout_piece']) AND !empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']))
        {
            $id = intval($_SESSION['id']); // id de session
            $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);

            if(!empty($_POST['logo']))
            {
                $type_piece = $_POST['logo'];
                $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
                $reponse2 =checkCapteur($bdd, $n_serie2);
                $reponse3 =checkCapteur($bdd, $n_serie3);
                $data = $reponse->fetch();
                $data2 = $reponse2 -> fetch();
                $data3 = $reponse3 -> fetch();


                $test = read_n_tram($bdd, $id);
                $n_tram = $test ->fetch();
                if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND  $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie3 != $n_serie2) // si le capteur existe
                {
                    insertpiece($bdd, $piece, $id,$type_piece); // La piece est créée
                    $id_new_piece = idNewPiece($bdd, $id,$type_piece);
                    $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
                    //echo($id_new_piece2[0]);
                    $data = "$data[1]";
                    $data = "$data[1]"; // == H T L P ou V
                    $data2 = "$data2[1]";
                    $data2 = "$data2[1]";
                    $data3 = "$data3[1]";
                    $data3 = "$data3[1]";

                    //echo($data); == H T L P ou V
                    if($data == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }



                    if($data2 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }


                    if($data3 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data3 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data3 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data3 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data3 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                }
                else
                {
                    $msg = "il y a un problème avec l'un des numeros de série renseignés";
                    include('vue/ajout_piece_erreur.php');
                }
        
            }
            else
            {
                $msg = 'Veuillez chosir un logo pour votre pièce';
                include('vue/ajout_piece_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/ajout_piece_erreur.php');
        }
    }
        
        


// ---------------------------------------------------------------------------------------------------//
    if (isset($_POST['formparapieces4'])) 
    {
        if(!empty($_POST['ajout_piece']) AND !empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']) AND !empty($_POST['ajout_capteur4']))
        {
            $id = intval($_SESSION['id']); // id de session
            $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);
            $n_serie4 =htmlspecialchars($_POST['ajout_capteur4']);

            if(!empty($_POST['logo']))
            {
                $type_piece = $_POST['logo'];
                $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
                $reponse2 =checkCapteur($bdd, $n_serie2);
                $reponse3 =checkCapteur($bdd, $n_serie3);
                $reponse4 =checkCapteur($bdd, $n_serie4);
                $data = $reponse->fetch();
                $data2 = $reponse2 -> fetch();
                $data3 = $reponse3 -> fetch();
                $data4 = $reponse4 -> fetch();


                $test = read_n_tram($bdd, $id);
                $n_tram = $test ->fetch();

                if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND $reponse4 -> rowcount() ==1 AND $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie != $n_serie4 AND $n_serie2 != $n_serie3 AND $n_serie2 != $n_serie4 AND $n_serie3 != $n_serie4) // si le capteur existe 
                {
                    insertpiece($bdd, $piece, $id,$type_piece); // La piece est créée
                    $id_new_piece = idNewPiece($bdd, $id);
                    $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
                    //echo($id_new_piece2[0]);
                    $data = "$data[1]";
                    $data = "$data[1]"; // == H T L P ou V
                    $data2 = "$data2[1]";
                    $data2 = "$data2[1]";
                    $data3 = "$data3[1]";
                    $data3 = "$data3[1]";
                    $data4 = "$data4[1]";
                    $data4 = "$data4[1]";

                    //echo($data); == H T L P ou V
                    if($data == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }



                    if($data2 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }


                    if($data3 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }



                    if($data4 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data4 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data4 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data4 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data4 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                }
                else
                {
                    $msg = "il y a un problème avec l'un des numeros de série renseignés";
                    include('vue/ajout_piece_erreur.php');
                }
            }
            else
            {
                $msg = 'Veuillez chosir un logo pour votre pièce';
                include('vue/ajout_piece_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/ajout_piece_erreur.php');
        }
        
    }


//--------------------------------------------------------------------------------------------------------------------//


    if (isset($_POST['formparapieces5'])) 
    {
        if(!empty($_POST['ajout_piece']) AND !empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']) AND !empty($_POST['ajout_capteur4']))
        {
            $id = intval($_SESSION['id']); // id de session
            $piece = htmlspecialchars($_POST['ajout_piece']); // nom de la piece
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);
            $n_serie4 =htmlspecialchars($_POST['ajout_capteur4']);
            $n_serie5 =htmlspecialchars($_POST['ajout_capteur5']);

            if(!empty($_POST['logo']))
            {
                $type_piece = $_POST['logo'];
                $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
                $reponse2 =checkCapteur($bdd, $n_serie2);
                $reponse3 =checkCapteur($bdd, $n_serie3);
                $reponse4 =checkCapteur($bdd, $n_serie4);
                $reponse5 =checkCapteur($bdd, $n_serie5);
                $data = $reponse->fetch();
                $data2 = $reponse2 -> fetch();
                $data3 = $reponse3 -> fetch();
                $data4 = $reponse4 -> fetch();
                $data5 = $reponse5 -> fetch();

                $test = read_n_tram($bdd, $id);
                $n_tram = $test ->fetch();
                if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND $reponse4 -> rowcount() ==1 AND $reponse5 -> rowcount() == 1 AND $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie != $n_serie4 AND $n_serie != $n_serie5 AND $n_serie2 != $n_serie3 AND $n_serie2 != $n_serie4 AND $n_serie2 != $n_serie5 AND $n_serie3 != $n_serie4 AND $n_serie3 != $n_serie5 AND $n_serie4 != $n_serie5) // si le capteur existe 
                {
                    insertpiece($bdd, $piece, $id,$type_piece); // La piece est créée
                    $id_new_piece = idNewPiece($bdd, $id);
                    $id_new_piece2 = $id_new_piece -> fetch(); // On récupère l'id de la nouvelle piece
                    //echo($id_new_piece2[0]);
                    $data = "$data[1]";
                    $data = "$data[1]"; // == H T L P ou V
                    $data2 = "$data2[1]";
                    $data2 = "$data2[1]";
                    $data3 = "$data3[1]";
                    $data3 = "$data3[1]";
                    $data4 = "$data4[1]";
                    $data4 = "$data4[1]";
                    $data5 = "$data5[1]";
                    $data5 = "$data5[1]";

                    //echo($data); == H T L P ou V
                    if($data == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }
                    elseif($data == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie, $n_tram);
                        update_etat_produit($bdd,$n_serie);
                    }



                    if($data2 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }
                    elseif($data2 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie2, $n_tram);
                        update_etat_produit($bdd,$n_serie2);
                    }


                    if($data3 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }
                    elseif($data3 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie3, $n_tram);
                        update_etat_produit($bdd,$n_serie3);
                    }



                    if($data4 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                    }
                    elseif($data4 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                    }
                    elseif($data4 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                    }
                    elseif($data4 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                    }
                    elseif($data4 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie4, $n_tram);
                        update_etat_produit($bdd,$n_serie4);
                    }

                    if($data5 == "H")
                    {
                        $type = "humidite";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie5, $n_tram);
                        update_etat_produit($bdd,$n_serie5);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data5 == "T")
                    {
                        $type = "temperature";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie5, $n_tram);
                        update_etat_produit($bdd,$n_serie5);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data5 == "L")
                    {
                        $type = "light";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie5, $n_tram);
                        update_etat_produit($bdd,$n_serie5);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data5 == "P")
                    {
                        $type = 'presence';
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie5, $n_tram);
                        update_etat_produit($bdd,$n_serie5);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                    elseif($data5 == "V")
                    {
                        $type = "volet";
                        $n_tram = $n_tram['n_tram'] + 1;
                        insertcapteur($bdd,$id_new_piece2[0], $type, $n_serie5, $n_tram);
                        update_etat_produit($bdd,$n_serie5);
                        $msg = 'Votre piece a bien été créée !';
                        include('vue/ajout_piece_erreur.php');
                    }
                }
                else
                {
                    $msg = "il y a un problème avec l'un des numeros de série renseignés";
                    include('vue/ajout_piece_erreur.php');
                }

            }
            else
            {
                $msg = 'Veuillez chosir un logo pour votre pièce';
                include('vue/ajout_piece_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/ajout_piece_erreur.php');
        }




       

            
    }
        //include'vue/ajout_capteurs.php';
        
    if(isset($_POST['formcapteur']))
    {
        if(!empty($_POST['ajout_capteur']))
        {
            $id = intval($_SESSION['id']); // id de session
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné

            $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
            $data = $reponse->fetch();


            $test = read_n_tram($bdd, $id);
            $test2 = $test ->fetch();

            if ($reponse -> rowcount() == 1) // si le capteur existe 
            {
                
                $data = "$data[1]";
                $data = "$data[1]"; // == H T L P ou V
                //echo($data);// == H T L P ou V
                $id_piece = $_GET['id_piece'];
                if($data == "H")
                {
                    $type = "humidite";
                    $test2 = $test2['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $test2);
                    update_etat_produit($bdd,$n_serie);
                    $msg = 'Votre capteur a bien été ajouté!';
                    include('vue/capteur_erreur.php');
                }
                elseif($data == "T")
                {
                    $type = "temperature";
                    $test2 = $test2['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $test2);
                    update_etat_produit($bdd,$n_serie);
                    $msg = 'Votre capteur a bien été ajouté';
                    include('vue/capteur_erreur.php');
                }
                elseif($data == "L")
                {
                    $type = "light";
                    $test2 = $test2['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $test2);
                    update_etat_produit($bdd,$n_serie);
                    $msg = 'Votre capteur a bien été ajouté';
                    include('vue/capteur_erreur.php');
                }
                elseif($data == "P")
                {
                    $type = 'presence';
                    $test2 = $test2['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $test2);
                    update_etat_produit($bdd,$n_serie);
                    $msg = 'Votre capteur a bien été ajouté';
                    include('vue/capteur_erreur.php');
                }
                elseif($data == "V")
                {
                    $type = "volet";
                    $test2 = $test2['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $test2);
                    update_etat_produit($bdd,$n_serie);
                    $msg = 'Votre capteur a bien été ajouté';
                    include('vue/capteur_erreur.php');
                }
            }
            else
            {
                $msg = "Le numéro de série renseigné est erroné";
                include('vue/capteur_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/capteur_erreur.php'); 
        }
    }
    


    if (isset($_POST['formcapteur2'])) 
    {
        if(!empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']))
        {
            $id = intval($_SESSION['id']); // id de session
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            
            $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
            $reponse2 =checkCapteur($bdd, $n_serie2);
            $data = $reponse->fetch();
            $data2 = $reponse2 -> fetch();


            $test = read_n_tram($bdd, $id);
            $n_tram = $test ->fetch();
            if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $n_serie != $n_serie2) // si le capteur existe 
            {
                
                //echo($id_new_piece2[0]);
                $id_piece = $_GET['id_piece'];
                $data = "$data[1]";
                $data = "$data[1]"; // == H T L P ou V
                $data2 = "$data2[1]";
                $data2 = "$data2[1]";

                //echo($data); == H T L P ou V
                if($data == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }



                if($data2 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data2 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data2 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data2 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data2 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
            }
            else
            {
                $msg = "il y a un problème avec l'un des numeros de série renseignés";
                include('vue/capteur_erreur.php');
            }

        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/capteur_erreur.php');
        }
    }


if (isset($_POST['formcapteur3'])) 
    {
        if(!empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']))
        {
            $id = intval($_SESSION['id']); // id de session
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);
            $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
            $reponse2 =checkCapteur($bdd, $n_serie2);
            $reponse3 =checkCapteur($bdd, $n_serie3);
            $data = $reponse->fetch();
            $data2 = $reponse2 -> fetch();
            $data3 = $reponse3 -> fetch();


            $test = read_n_tram($bdd, $id);
            $n_tram = $test ->fetch();
            if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND  $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie3 != $n_serie2) // si le capteur existe
            {
                //echo($id_new_piece2[0]);
                $data = "$data[1]";
                $data = "$data[1]"; // == H T L P ou V
                $data2 = "$data2[1]";
                $data2 = "$data2[1]";
                $data3 = "$data3[1]";
                $data3 = "$data3[1]";
                $id_piece = $_GET['id_piece'];

                //echo($data); == H T L P ou V
                if($data == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }



                if($data2 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }


                if($data3 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data3 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data3 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data3 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data3 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
            }
            else
            {
                $msg = "il y a un problème avec l'un des numeros de série renseignés";
                include('vue/capteur_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/capteur_erreur.php');
        }
    }
     
if (isset($_POST['formcapteur4'])) 
    {
        if(!empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']) AND !empty($_POST['ajout_capteur4']))
        {
            $id = intval($_SESSION['id']); // id de session
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);
            $n_serie4 =htmlspecialchars($_POST['ajout_capteur4']);

           
            $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
            $reponse2 =checkCapteur($bdd, $n_serie2);
            $reponse3 =checkCapteur($bdd, $n_serie3);
            $reponse4 =checkCapteur($bdd, $n_serie4);
            $data = $reponse->fetch();
            $data2 = $reponse2 -> fetch();
            $data3 = $reponse3 -> fetch();
            $data4 = $reponse4 -> fetch();


            $test = read_n_tram($bdd, $id);
            $n_tram = $test ->fetch();

            if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND $reponse4 -> rowcount() ==1 AND $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie != $n_serie4 AND $n_serie2 != $n_serie3 AND $n_serie2 != $n_serie4 AND $n_serie3 != $n_serie4) // si le capteur existe 
            {
                $data = "$data[1]";
                $data = "$data[1]"; // == H T L P ou V
                $data2 = "$data2[1]";
                $data2 = "$data2[1]";
                $data3 = "$data3[1]";
                $data3 = "$data3[1]";
                $data4 = "$data4[1]";
                $data4 = "$data4[1]";
                $id_piece = $_GET['id_piece'];

                //echo($data); == H T L P ou V
                if($data == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }



                if($data2 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }


                if($data3 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }



                if($data4 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data4 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data4 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data4 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data4 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
            }
            else
            {
                $msg = "il y a un problème avec l'un des numeros de série renseignés";
                include('vue/capteur_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/capteur_erreur.php');
        }
        
    }



    if (isset($_POST['formcapteur5'])) 
    {
        if(!empty($_POST['ajout_capteur']) AND !empty($_POST['ajout_capteur2']) AND !empty($_POST['ajout_capteur3']) AND !empty($_POST['ajout_capteur4']))
        {
            $id = intval($_SESSION['id']); // id de session
            $n_serie = htmlspecialchars($_POST['ajout_capteur']); // n° de serie donné
            $n_serie2 =htmlspecialchars($_POST['ajout_capteur2']);
            $n_serie3 =htmlspecialchars($_POST['ajout_capteur3']);
            $n_serie4 =htmlspecialchars($_POST['ajout_capteur4']);
            $n_serie5 =htmlspecialchars($_POST['ajout_capteur5']);

            $reponse = checkCapteur($bdd, $n_serie); // Verifie que le capteur existe dans la bdd
            $reponse2 =checkCapteur($bdd, $n_serie2);
            $reponse3 =checkCapteur($bdd, $n_serie3);
            $reponse4 =checkCapteur($bdd, $n_serie4);
            $reponse5 =checkCapteur($bdd, $n_serie5);
            $data = $reponse->fetch();
            $data2 = $reponse2 -> fetch();
            $data3 = $reponse3 -> fetch();
            $data4 = $reponse4 -> fetch();
            $data5 = $reponse5 -> fetch();

            $test = read_n_tram($bdd, $id);
            $n_tram = $test ->fetch();
            if ($reponse -> rowcount() == 1 AND $reponse2 -> rowcount() == 1 AND $reponse3 -> rowcount() == 1 AND $reponse4 -> rowcount() ==1 AND $reponse5 -> rowcount() == 1 AND $n_serie != $n_serie2 AND $n_serie != $n_serie3 AND $n_serie != $n_serie4 AND $n_serie != $n_serie5 AND $n_serie2 != $n_serie3 AND $n_serie2 != $n_serie4 AND $n_serie2 != $n_serie5 AND $n_serie3 != $n_serie4 AND $n_serie3 != $n_serie5 AND $n_serie4 != $n_serie5) // si le capteur existe 
            {
                //echo($id_new_piece2[0]);
                $data = "$data[1]";
                $data = "$data[1]"; // == H T L P ou V
                $data2 = "$data2[1]";
                $data2 = "$data2[1]";
                $data3 = "$data3[1]";
                $data3 = "$data3[1]";
                $data4 = "$data4[1]";
                $data4 = "$data4[1]";
                $data5 = "$data5[1]";
                $data5 = "$data5[1]";
                $id_piece = $_GET['id_piece'];

                //echo($data); == H T L P ou V
                if($data == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }
                elseif($data == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie, $n_tram);
                    update_etat_produit($bdd,$n_serie);
                }



                if($data2 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }
                elseif($data2 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie2, $n_tram);
                    update_etat_produit($bdd,$n_serie2);
                }


                if($data3 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }
                elseif($data3 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie3, $n_tram);
                    update_etat_produit($bdd,$n_serie3);
                }



                if($data4 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                }
                elseif($data4 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                }
                elseif($data4 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                }
                elseif($data4 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                }
                elseif($data4 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie4, $n_tram);
                    update_etat_produit($bdd,$n_serie4);
                }

                if($data5 == "H")
                {
                    $type = "humidite";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie5, $n_tram);
                    update_etat_produit($bdd,$n_serie5);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data5 == "T")
                {
                    $type = "temperature";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie5, $n_tram);
                    update_etat_produit($bdd,$n_serie5);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data5 == "L")
                {
                    $type = "light";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie5, $n_tram);
                    update_etat_produit($bdd,$n_serie5);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data5 == "P")
                {
                    $type = 'presence';
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie5, $n_tram);
                    update_etat_produit($bdd,$n_serie5);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
                elseif($data5 == "V")
                {
                    $type = "volet";
                    $n_tram = $n_tram['n_tram'] + 1;
                    insertcapteur($bdd,$id_piece, $type, $n_serie5, $n_tram);
                    update_etat_produit($bdd,$n_serie5);
                    $msg = 'Vos capteurs ont bien été ajoutés';
                    include('vue/capteur_erreur.php');
                }
            }
            else
            {
                $msg = "il y a un problème avec l'un des numeros de série renseignés";
                include('vue/capteur_erreur.php');
            }
        }
        else
        {
            $msg = 'Veuillez remplir tous les champs !';
            include('vue/capteur_erreur.php');
        }

    }





/* -----------------------------------------------------------------------------------------------------------*/



//  FORMULAIRE INSERTION VALEUR 

    if (isset($_POST['form_insert_valeur'])) 
    {
        $tram = htmlspecialchars($_POST['tram']);
        if (!empty($tram)) 
        {
            $id_utilisateur = intval($_POST['deroulant_user']);
            $type_tram = substr($tram, 0, 1); //1 - TYPE DE TRAM UTILISÉ - toujours la premiere tram
            $objet = substr($tram, 1, 4); //4 - NUMERO D'EQUIPE - ne change jamais
            $requete = substr($tram, 5, 1); //1 - IDENTIFIE LA COMMANDE - modifie l'etat du capteur
            $type = substr($tram, 6,1); // 1 - LE TYPE DE CAPTEUR
            $numero = substr($tram, 7, 2); //2 - NUMERO DE CAPTEUR
            $valeur_capteur_hex = substr($tram, 9, 4); //4 - VALEUR DU CAPTEUR
            $date = substr($tram, 13, 4); // 4 - DATE
            $valeur_capteur_dec = hexdec($valeur_capteur_hex);

            insertdonnees($bdd, $valeur_capteur_dec, $date, $numero, $id_utilisateur);
        }
        else
        {
            $msg ="Veuillez remplir tous les champs";
        }
        
    }


/* -----------------------------------------------------------------------------------------------------------*/


// FORMULAIRE DE CRATION DE SCENARIO


// SCENARIO LAMPE

$msg='';

if (isset($_POST['formscenario_lampe'])) 
{
    $nom_scenario = htmlspecialchars($_POST['nom_scenario']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);
    $id_utilisateur = $_SESSION['id'];

    if (!empty($date_debut) AND !empty($date_fin) AND !empty($nom_scenario)) // DATE DE DEBUT ET DE FIN
    {
        //echo $date_debut.'<br>';
        //echo $date_fin.'<br>';
        //echo $nom_scenario.'<br>';


        if ($date_debut == $date_fin) 
        {
            //echo "date debut = date de fin";

            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    if ($choixh_d < $choixh_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "light";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    if ($choixh_d == $choixh_f AND $choixm_d <= $choixm_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "light";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    else
                    {
                        $msg ="Veuillez renseigner une heure de début inférieur à l'heure de fin du scénario";
                    }

                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut < $date_fin) 
        {
            //echo "date de debut < date de fin";
            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    
                    //insert dans la bdd
                    //echo $choixh_d.'H'.$choixm_d.'m<br>';
                    //echo $choixh_f.'H'.$choixm_f.'m<br>';
                    $heure_debut = $choixh_d.$choixm_d.'00';
                    $heure_fin = $choixh_f.$choixm_f.'00';
                    $type_scenario = "light";
                    $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                    $msg = "Votre scénario a bien été créer";             
                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut > $date_fin)
        {
            //echo "date_debut > date_fin";
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))
            {
                $msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
            }
            
        }
        
    }
    else
    {
        $msg="Veuillez renseigner une date de début et de fin du scénario.";
    }
}
//echo $msg;








//SCENARIO CHAUFFAGE


// INSERT VALEUR CHAUFFAGE SCROLL

if (isset($_POST['form_scroll_chauffage'])) 
{
    $id_utilisateur = $_SESSION['id'];
    $valeur = htmlspecialchars($_POST['sliderinput']);
    $date_capteur = date("Y-m-d H:i");
    //echo($date_capteur);
    
    $reponse = read_chauffage($bdd, $id_utilisateur);
    $data = $reponse-> fetchAll();
    $data_size = sizeof($data);
    for ($i=0; $i < $data_size ; $i++) 
    { 
        $reponse =insert_valeur_chauffage($bdd, $valeur, $date_capteur, $data[$i][0], $id_utilisateur);
        //echo "Les valeurs de chauffage ont étaient modifiés !";
    }

}

// INSERT SCENARIO CHAUFFAGE

$msg='';

if (isset($_POST['formscenario_chauffage'])) 
{
    //echo "le form a bien était validé !";
    $nom_scenario = htmlspecialchars($_POST['nom_scenario']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);
    $valeur = htmlspecialchars($_POST['valeur_chauffage']);
    $id_utilisateur = $_SESSION['id'];

    if (!empty($nom_scenario) AND !empty($date_debut) AND !empty($date_fin) AND !empty($nom_scenario) AND !empty($valeur)) // DATE DE DEBUT ET DE FIN
    {

        if ($date_debut == $date_fin) 
        {
                
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
            {
                $choixh_d = $_POST['choixh_d'];
                $choixm_d = $_POST['choixm_d'];
                $choixh_f = $_POST['choixh_f'];
                $choixm_f = $_POST['choixm_f'];
                if ($choixh_d < $choixh_f) 
                {
                    //echo $choixh_d.'H'.$choixm_d.'m<br>';
                    //echo $choixh_f.'H'.$choixm_f.'m<br>';
                    $heure_debut = $choixh_d.$choixm_d.'00';
                    $heure_fin = $choixh_f.$choixm_f.'00';
                    $type_scenario = "temperature";
                    $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                    $msg = "Votre scénario a bien été créer";
                }
                if ($choixh_d == $choixh_f AND $choixm_d <= $choixm_f) 
                {
                    //echo $choixh_d.'H'.$choixm_d.'m<br>';
                    //echo $choixh_f.'H'.$choixm_f.'m<br>';
                    $heure_debut = $choixh_d.$choixm_d.'00';
                    $heure_fin = $choixh_f.$choixm_f.'00';
                    $type_scenario = "temperature";
                    $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                    $msg = "Votre scénario a bien été créer";
                }
                else
                {
                    $msg ="Veuillez renseigner une heure de début inférieur à l'heure de fin du scénario";
                }

            }
            else
            {
                $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
            }
            
        }

        elseif ($date_debut < $date_fin) 
        {
            //echo "date de debut < date de fin<br>";
            
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
            {
                $choixh_d = $_POST['choixh_d'];
                $choixm_d = $_POST['choixm_d'];
                $choixh_f = $_POST['choixh_f'];
                $choixm_f = $_POST['choixm_f'];
                
                //insert dans la bdd
                //echo $choixh_d.'H'.$choixm_d.'m<br>';
                //echo $choixh_f.'H'.$choixm_f.'m<br>';
                $heure_debut = $choixh_d.$choixm_d.'00';
                $heure_fin = $choixh_f.$choixm_f.'00';
                $type_scenario = "temperature";
                $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                $msg = "Votre scénario a bien été créer";             
            }
            else
            {
                $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
            }
            
        }

        elseif ($date_debut > $date_fin)
        {
            //echo "date_debut > date_fin";
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))
            {
                $msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
            }
            
        }
        
    }
    else
    {
        $msg="Veuillez renseigner une date de début et de fin du scénario.";
    }
}
//echo $msg;

// SCENARIO VOLETS 


$msg='';

if (isset($_POST['formscenario_volet'])) 
{
    $nom_scenario = htmlspecialchars($_POST['nom_scenario']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);
    $id_utilisateur = $_SESSION['id'];

    if (!empty($date_debut) AND !empty($date_fin) AND !empty($nom_scenario)) // DATE DE DEBUT ET DE FIN
    {
        //echo $date_debut.'<br>';
        //echo $date_fin.'<br>';
        //echo $nom_scenario.'<br>';


        if ($date_debut == $date_fin) 
        {
            //echo "date debut = date de fin";

            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    if ($choixh_d < $choixh_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "volet";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    if ($choixh_d == $choixh_f AND $choixm_d <= $choixm_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "volet";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    else
                    {
                        $msg ="Veuillez renseigner une heure de début inférieur à l'heure de fin du scénario";
                    }

                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut < $date_fin) 
        {
            //echo "date de debut < date de fin";
            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    
                    //insert dans la bdd
                    //echo $choixh_d.'H'.$choixm_d.'m<br>';
                    //echo $choixh_f.'H'.$choixm_f.'m<br>';
                    $heure_debut = $choixh_d.$choixm_d.'00';
                    $heure_fin = $choixh_f.$choixm_f.'00';
                    $type_scenario = "volet";
                    $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                    $msg = "Votre scénario a bien été créer";             
                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut > $date_fin)
        {
            //echo "date_debut > date_fin";
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))
            {
                $msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
            }
            
        }
        
    }
    else
    {
        $msg="Veuillez renseigner une date de début et de fin du scénario.";
    }
}
//echo $msg;



// SCENARIO ALARME


$msg='';

if (isset($_POST['formscenario_alarme'])) 
{
    $nom_scenario = htmlspecialchars($_POST['nom_scenario']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);
    $id_utilisateur = $_SESSION['id'];

    if (!empty($date_debut) AND !empty($date_fin) AND !empty($nom_scenario)) // DATE DE DEBUT ET DE FIN
    {
        //echo $date_debut.'<br>';
        //echo $date_fin.'<br>';
        //echo $nom_scenario.'<br>';


        if ($date_debut == $date_fin) 
        {
            //echo "date debut = date de fin";

            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    if ($choixh_d < $choixh_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "presence";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    if ($choixh_d == $choixh_f AND $choixm_d <= $choixm_f) 
                    {
                        //echo $choixh_d.'H'.$choixm_d.'m<br>';
                        //echo $choixh_f.'H'.$choixm_f.'m<br>';
                        $heure_debut = $choixh_d.$choixm_d.'00';
                        $heure_fin = $choixh_f.$choixm_f.'00';
                        $type_scenario = "presence";
                        $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                        $msg = "Votre scénario a bien été créer";
                    }
                    else
                    {
                        $msg ="Veuillez renseigner une heure de début inférieur à l'heure de fin du scénario";
                    }

                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut < $date_fin) 
        {
            //echo "date de debut < date de fin";
            if(isset($_POST['choix_action']))
            {
                //echo "le 2 isset fonctionne";
                $valeur = $_POST['choix_action'];
                if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))  // HEURE DU DÉBUT DE SCÉNARIO
                {
                    $choixh_d = $_POST['choixh_d'];
                    $choixm_d = $_POST['choixm_d'];
                    $choixh_f = $_POST['choixh_f'];
                    $choixm_f = $_POST['choixm_f'];
                    
                    //insert dans la bdd
                    //echo $choixh_d.'H'.$choixm_d.'m<br>';
                    //echo $choixh_f.'H'.$choixm_f.'m<br>';
                    $heure_debut = $choixh_d.$choixm_d.'00';
                    $heure_fin = $choixh_f.$choixm_f.'00';
                    $type_scenario = "presence";
                    $reponse = insert_scenario($bdd,$nom_scenario, $date_debut, $date_fin, $heure_debut, $heure_fin, $valeur, $type_scenario, '1', $id_utilisateur);
                    $msg = "Votre scénario a bien été créer";             
                }
                else
                {
                    $msg="Veuillez renseigner l'heure de début et de fin du scénario.";
                }
            }
        }

        elseif ($date_debut > $date_fin)
        {
            //echo "date_debut > date_fin";
            if (isset($_POST['choixh_d']) AND isset($_POST['choixm_d']) AND isset($_POST['choixh_f']) AND isset($_POST['choixm_f']))
            {
                $msg = "La date de début du scénario doit être inférieur à la date de fin du scénario.";
            }
            
        }
        
    }
    else
    {
        $msg="Veuillez renseigner une date de début et de fin du scénario.";
    }
}
//echo $msg;

 /* -----------------------------------------------------------------------------------------------------------*/


// UPDATE CHAUFFAGE COMMUN

if (isset($_POST['form_scroll_chauffage_piece'])) 
{
    $id_utilisateur = $_SESSION['id'];
    $id_piece =$_GET['id_piece'];
    $valeur = htmlspecialchars($_POST['sliderinput']);
    $date_capteur = date("Y-m-d H:i");
    //echo($date_capteur);
    
    $reponse = read_chauffage_commun($bdd,$id_piece, $id_utilisateur);
    $data = $reponse-> fetchAll();
    $data_size = sizeof($data);
    for ($i=0; $i < $data_size ; $i++) 
    { 
        $reponse =insert_valeur_commun($bdd, $valeur, $date_capteur, $data[$i][0], $id_utilisateur);
        //echo "Les valeurs de chauffage ont étaient modifiés !";
    }
}

/* -----------------------------------------------Mon domaine-------------------------------------------------*/

if (isset($_POST['bouton_news'])) 
{
    $titre = htmlspecialchars($_POST['titre']);
    $message= htmlspecialchars($_POST['message']);
    
    insert_newss ($bdd, $titre, $message);
}


/* -----------------------------------------------------------------------------------------------------------*/


    if(isset($_GET['etat']))
    {
        if ($_GET['etat'] == 'capteur') 
        {
            $msg ='';
            include_once("vue/capteur_erreur.php");
        }
    }


    if (isset($_GET['cible'])) 
    {
        if ($_GET['cible'] == 'ajout_piece') 
        {
            include("vue/ajout_piece_test.php");
        }
        elseif ($_GET['cible'] == 'ajout_capteurs') 
        {
            include("vue/ajout_capteurs.php");
        }
        elseif ($_GET['cible'] == 'home') // HOME // OK
        {
            include("vue/home.php");
        }
        elseif ($_GET['cible'] == 'page_capteur_commun' AND $_GET['etat'] != 'capteur') 
        {
            $id_piece = $_GET['id_piece'];
            include("vue/page_capteur_commun.php");
        }
        elseif ($_GET['cible'] == 'reglage_capteur') 
        {
            $id_piece = $_GET['id_piece'];
            $type = $_GET['type'];
            include("vue/page_reglage_capteur.php");
        }
        elseif ($_GET['cible'] == 'supprimer_capteur') 
        {
            $id_piece = $_GET['id_piece'];
            $type = $_GET['type'];
            include("vue/page_reglage_capteur.php");
        }
        elseif ($_GET['cible'] == 'reglage') // REGLAGE
        {
            $id = $_SESSION["id"];
            include("vue/scenario.php");
        }
        elseif ($_GET['cible'] == 'securite') 
        {
            include("vue/insertion_valeur.php");
        }
        elseif ($_GET['cible'] == 'cguA') 
        {
            include("vue/cguA.php");
        }
        elseif ($_GET['cible'] == 'cgu') 
        {
            include("vue/cgu.php");
        }
        elseif ($_GET['cible'] == 'edition_profil') // OK
        {
            include("vue/edition_profil.php");
        }
        elseif ($_GET['cible'] == 'contact') // CONTACT
        {
            include("vue/newsletter.php");
        }
        elseif ($_GET['cible'] == 'newsletter') 
        {
            include("vue/newsletter.php");
        }
        elseif ($_GET['cible'] == 'sav') 
        {
            include("vue/sav.php");
        }
        elseif ($_GET['cible'] == 'newsletter') // ASIDE
        {
            include("vue/newsletter.php");
        }
        elseif ($_GET['cible'] == 'lampes') // ASIDE
        {
            include("vue/liste_capteur_lampe.php");
        }
        elseif ($_GET['cible'] == 'chauffage') 
        {
            include("vue/liste_capteur_chauffage.php");
        }
        elseif ($_GET['cible'] == 'volets') 
        {
            include("vue/liste_capteur_volet.php");
        }
        elseif ($_GET['cible'] == 'alarme') 
        {
            include("vue/liste_capteur_alarme.php");
        }
        elseif ($_GET['cible'] == 'scenario') 
        {
            include("vue/scenario.php");
        }
        elseif ($_GET['cible'] == 'cameras') 
        {
            include("vue/liste_capteur_camera.php");
        }

        //ADMIN

        elseif ($_GET['cible'] == "home_admin" AND isset($_SESSION["id"]) AND $_SESSION['id'] == 7) //OK
        {
            include("vue/home_admin.php");
        }
        elseif ($_GET['cible'] == "utilisateur") // OK
        {
            include("vue/gestion_utilisateur.php"); 
        }
        elseif ($_GET['cible'] == "reglages_generaux") // OK
        {
            include("vue/reglages_generaux.php"); 
        }
        elseif ($_GET['cible'] == "confirme") // OK
        {
            $id_mbr = $_GET['confirme'];
            include("vue/gestion_utilisateur.php");
        }
        elseif ($_GET['cible'] == "reglages_admin") // OK
        {
            include("vue/insertion_tram.php");
        }
        elseif ($_GET['cible'] == "insertion_tram") // OK
        {
            include("vue/insertion_tram.php");
        }
        elseif ($_GET['cible'] == "delete") // OK
        {
            $id_mbr = $_GET['delete'];
            include("vue/gestion_utilisateur.php");
        }
        elseif ($_GET['cible'] == "delete_piece") // OK
        {
            $id_mbr = $_GET['delete_piece'];
            include("vue/reglages_generaux.php");
        }
        elseif ($_GET['cible'] == "info_utilisateur") 
        {
            include("vue/info_utilisateur.php");
        }
        elseif ($_GET['cible'] == 'edition_newsletter') 
        {
            include("vue/newslettera.php");
        }
        else if ($_GET['cible'] == "deconnexion") // OK
        {

        // Détruit toutes les variables de session
        $_SESSION = array();
        /*if (isset($_COOKIE[session_name()])) 
        {
         setcookie(session_name(), '', time()-42000, '/');
        }*/
        session_destroy();
        include_once("Vue/page_connexion.php");
        }

    }  


?>
