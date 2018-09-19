<?php

	function showTechniciensMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from techniciens";
		$resultats = $pdo -> prepare($requete);
		$techniciens = $resultats -> fetchAll(PDO::FETCH_ASSOC);

		$techniciens -> execute();
	}

	function addTechnicienMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO techniciens (nom_tech, prenom_tech, qualification) 
					VALUES (:nom_tech, :prenom_tech, :qualification)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":nom_tech", $_POST["nom_tech"], PDO::PARAM_STR);
        $inserer -> bindParam (":prenom_tech", $_POST["prenom_tech"], PDO::PARAM_STR);
        $inserer -> bindParam (":qualification", $_POST["qualification"], PDO::PARAM_STR);

        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
        }
	}

	function updateTechnicienMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE techniciens 
					SET nom_tech = :nom_tech, prenom_tech = :prenom_tech, 
						qualification = :qualification
		 			WHERE ref_tech = :ref_tech";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":nom_tech", $_POST["nom_tech"], PDO::PARAM_STR);
        $resultat -> bindParam (":prenom_tech", $_POST["prenom_tech"], PDO::PARAM_STR);
        $resultat -> bindParam (":qualification", $_POST["qualification"], PDO::PARAM_STR);
        $resultat -> bindParam (":ref_tech", $_POST["ref_tech"], PDO::PARAM_INT);

        $resultat->execute();
	}

	function deleteTechnicienMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM techniciens 
					WHERE ref_tech = :ref_tech";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":ref_tech", $_POST["ref_tech"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>