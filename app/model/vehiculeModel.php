<?php

	function showVehiculesMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from vehicules";
		$resultats = $pdo -> prepare($requete);
		$vehicules = $resultats -> fetchAll(PDO::FETCH_ASSOC);

		$vehicules -> execute();
	}

	function addVehiculeMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO vehicules (nom_vehicule, type_vehicule, matricule, libelle) 
					VALUES (:nom_vehicule, :type_vehicule, :matricule, :libelle)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":nom_vehicule", $_POST["nom_vehicule"], PDO::PARAM_STR);
        $inserer -> bindParam (":type_vehicule", $_POST["type_vehicule"], PDO::PARAM_STR);
        $inserer -> bindParam (":matricule", $_POST["matricule"], PDO::PARAM_INT);
        $inserer -> bindParam (":libelle", $_POST["libelle"], PDO::PARAM_STR);

        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
        }
	}

	function updateVehiculeMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE vehicules 
					SET nom_vehicule = :nom_vehicule, type_vehicule = :type_vehicule, 
						matricule = :matricule, libelle = :libelle
		 			WHERE code_cat = :code_cat";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":nom_vehicule", $_POST["nom_vehicule"], PDO::PARAM_STR);
        $resultat -> bindParam (":type_vehicule", $_POST["type_vehicule"], PDO::PARAM_STR);
        $resultat -> bindParam (":matricule", $_POST["matricule"], PDO::PARAM_INT);
        $resultat -> bindParam (":libelle", $_POST["libelle"], PDO::PARAM_STR);

        $resultat->execute();
	}

	function deleteVehiculeMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM vehicules 
					WHERE code_cat = :code_cat";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":code_cat", $_POST["code_cat"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>