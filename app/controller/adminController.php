<?php

include("model/adminModel.php");

function addAdminCtrl()
{
	    // VERIFICATION QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST["email"]) && !empty($_POST["mdp"]))  
    {

    // VERIFICAITON SI LES CHAMPS SONT EN PLACE
      if (isset($_POST["email"]) && isset($_POST["mdp"])) 
      {

      	  // APPEL DE LA FONCTION d'INSERTION D'AGENCE
      	  addAdminMdl(); 

      } // Fin isset() .. // 

  	} // Fin !empty() .. //

} // FIN addAdminCtrl //