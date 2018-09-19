<?php

include("model/agenceModel.php");

function addAgenceCtrl()
{
	    // VERIFICATION QUE LES CHAMPS NE SONT PAS VIDE
    if (!empty($_POST["nom_ag"]) && !empty($_POST["adresse_ag"]) && !empty($_POST["email_ag"]) && 
        !empty($_POST["representant"]) && !empty($_POST["ville_ag"]) && !empty($_POST["cp_ag"]) &&
        !empty($_POST["tel_ag"]))  
    {

    // VERIFICAITON SI LES CHAMPS SONT EN PLACE
      if (isset($_POST["nom_ag"]) && isset($_POST["adresse_ag"]) && isset($_POST["email_ag"]) && 
          isset($_POST["representant"]) && isset($_POST["ville_ag"]) && isset($_POST["cp_ag"]) &&
          isset($_POST["tel_ag"])) 
      {
      	  // APPEL DE LA FONCTION d'INSERTION D'AGENCE
      	  addAgenceMdl(); 

      } // Fin isset() .. // 

  	} // Fin !empty() .. //

} // FIN addAgenceCtrl //

function showAgencesCtrl()
{
  $agences = showAgencesMdl();

  return $agences;
}

function deleteAgenceCtrl($idAgence)
{
  deleteAgenceMdl($idAgence);
}
?>		