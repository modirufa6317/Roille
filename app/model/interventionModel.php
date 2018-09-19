<?php

	function showInterventionsMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from interventions";
		$resultats = $pdo -> prepare($requete);
		$interventions = $resultats -> fetchAll(PDO::FETCH_ASSOC);

		$interventions -> execute();
	}

	function addTechnicienMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO interventions (ref_inter, date_inter, type_inter, motif_inter, tarif_inter) 
					VALUES (:ref_inter, :date_inter, :type_inter, :motif_inter, :tarif_inter)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":date_inter", $_POST["date_inter"], PDO::PARAM_STR);
        $inserer -> bindParam (":type_inter", $_POST["type_inter"], PDO::PARAM_STR);
        $inserer -> bindParam (":motif_inter", $_POST["motif_inter"], PDO::PARAM_STR);
        $inserer -> bindParam (":tarif_inter", $_POST["tarif_inter"], PDO::PARAM_INT);

        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
        }
	}

	function updateInterventionMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE techniciens 
					SET date_inter = :date_inter, type_inter = :type_inter, 
						motif_inter = :motif_inter, tarif_inter = :tarif_inter
		 			WHERE ref_inter = :ref_inter";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":date_inter", $_POST["date_inter"], PDO::PARAM_STR);
        $resultat -> bindParam (":type_inter", $_POST["type_inter"], PDO::PARAM_STR);
        $resultat -> bindParam (":motif_inter", $_POST["motif_inter"], PDO::PARAM_STR);
        $resultat -> bindParam (":tarif_inter", $_POST["tarif_inter"], PDO::PARAM_INT);

        $resultat->execute();
	}

	function deleteInterventionMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM interventions 
					WHERE ref_inter = :ref_inter";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":ref_inter", $_POST["ref_inter"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>