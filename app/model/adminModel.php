<?php

function addAdminMdl()
{

	include("../inc/init.inc.php");
	
    $resultat = $pdo -> prepare("SELECT * FROM admin WHERE email = :email");
    $resultat -> bindParam(":email", $_POST["email"], PDO::PARAM_STR);
    $resultat -> execute();

    if($resultat -> rowCount() > 0){
        echo "Le mail ".$_POST["email"]." n'est pas disponible ! Veuillez choisir un autre email";
    }
    else 
    {

        $resultat = $pdo -> prepare("INSERT INTO admin(email, mdp)
                                    VALUES(:email, :mdp)");

        $resultat -> bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $mdp = md5($_POST["mdp"]);
        $resultat -> bindParam(":mdp", $mdp, PDO::PARAM_STR);

        if($resultat -> execute())
        {
            echo "Insertion Admin réussie";
        }
    }
}