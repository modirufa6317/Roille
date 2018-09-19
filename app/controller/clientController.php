<?php
// Le fichier clientModel.php est requis afin de pouvoir envoyer les requêtes en BDD
require("../model/clientModel.php");
require("../functions.php");

function addClientCtrl()
{

      // On
	    // VERIFICATION QUE LES CHAMPS EXISTENT
    if (
            isset($_POST["code_agence"]) 
            && isset($_POST["nom_cli"]) 
            && isset($_POST["prenom_cli"]) 
            && isset($_POST["mdp_cli"]) 
            && isset($_POST["adresse_cli"]) 
            && isset($_POST["cp_cli"]) 
            && isset($_POST["email_cli"]) 
            && isset($_POST["ville_cli"]) 
            && isset($_POST["tel_cli"])
       )  
    {

    // VERIFICAITON SI LES CHAMPS NE SONT PAS VIDE
      if (
            !empty($_POST["code_agence"]) 
            && !empty($_POST["nom_cli"]) 
            && !empty($_POST["prenom_cli"]) 
            && !empty($_POST["mdp_cli"]) 
            && !empty($_POST["adresse_cli"]) 
            && !empty($_POST["cp_cli"]) 
            && !empty($_POST["email_cli"]) 
            && !empty($_POST["ville_cli"]) 
            && !empty($_POST["tel_cli"])  
          ) 
      {
          extract($_POST);
          if(strlen($_POST["mdp_cli"]) > 5)
          {
            $hashPass = password_hash($_POST["mdp_cli"], PASSWORD_DEFAULT);
            // RETURN TRUE OR FALSE
            if (password_verify('rasmuslerdorf', $hash)) {
              echo 'Le mot de passe est valide !';
          } else {
              echo 'Le mot de passe est invalide.';
          }
          
          }
          // La fonction extract() est regarder dans le manuel de php.net
          // ex $_POST['cp_cli] deviendra alors $cp_cli 
          

          // Cette methode se trouve dans le fichier clientModel.php              
      	  addClientMdl(); 

      } // Fin isset() 

  	} // Fin isset() .

} // FIN addAgenceCtrl //
