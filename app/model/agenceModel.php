<?php
	
	// FONCTION PERMETTANT D'AJOUTER UNE AGENCE
	function addAgenceMdl()
	{	
		include("../inc/init.inc.php");

		$requete = "INSERT INTO agence (nom_ag, adresse_ag, email_ag, tel_ag, cp_ag, 
								ville_ag, representant) 
					VALUES (:nom_ag, :adresse_ag, :email_ag, :tel_ag, :cp_ag, 
						    :ville_ag, :representant);";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":nom_ag", $_POST["nom_ag"], PDO::PARAM_STR);
        $inserer -> bindParam (":adresse_ag", $_POST["adresse_ag"], PDO::PARAM_STR);
        $inserer -> bindParam (":email_ag", $_POST["email_ag"], PDO::PARAM_STR);
        $inserer -> bindParam (":tel_ag", $_POST["tel_ag"], PDO::PARAM_INT);
        $inserer -> bindParam (":cp_ag", $_POST["cp_ag"], PDO::PARAM_INT);
        $inserer -> bindParam (":ville_ag", $_POST["ville_ag"], PDO::PARAM_STR);
        $inserer -> bindParam (":representant", $_POST["representant"], PDO::PARAM_STR);

        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
        }
	}

	function showAgencesMdl()
	{
		include("../inc/init.inc.php");
		$requete = "SELECT * FROM agences";
		$resultat = $pdo -> query($requete);
		$agences = $resultat -> fetchAll(PDO::FETCH_ASSOC);	
		return $agences;		
	}

	function updateAgenceMdl($code_ag)
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE agences 
					SET nom_ag = :nom_ag, adresse_ag = :adresse_ag, 
						email_ag = :email_ag, tel_ag = :tel_ag, cp_ag = :cp_ag, 
						ville_ag = :ville_ag, representant = :representant
		 			WHERE code_ag = :code_ag";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":nom_ag", $_POST["nom_ag"], PDO::PARAM_STR);
        $resultat -> bindParam (":adresse_ag", $_POST["adresse_ag"], PDO::PARAM_STR);
        $resultat -> bindParam (":email_ag", $_POST["email_ag"], PDO::PARAM_STR);
        $resultat -> bindParam (":tel_ag", $_POST["tel_ag"], PDO::PARAM_INT);
        $resultat -> bindParam (":cp_ag", $_POST["cp_ag"], PDO::PARAM_INT);
        $resultat -> bindParam (":ville_ag", $_POST["ville_ag"], PDO::PARAM_STR);
        $resultat -> bindParam (":representant", $_POST["representant"], PDO::PARAM_STR);
        $resultat -> bindParam (":code_ag", $_POST["code_ag"], PDO::PARAM_INT);
	}

	function deleteAgenceMdl($code_ag)
	{
		include("../inc/init.inc.php");
		$requete = "DELETE FROM agences 
					WHERE code_ag = :code_ag";
		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":code_ag", $code_ag, PDO::PARAM_INT);
		$resultat -> execute();
	}

?>