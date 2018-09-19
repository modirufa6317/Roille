<?php

	function showOutilsMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from outillage";
		$resultats = $pdo -> prepare($requete);
		$outils = $resultats -> fetchAll(PDO::FETCH_ASSOC);
		$outils -> execute();
	}

	function addOutilMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO outillage (nom_outil, type_outil, libelle) 
					VALUES (:nom_outil, :type_outil, :libelle)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":nom_outil", $_POST["nom_outil"], PDO::PARAM_STR);
        $inserer -> bindParam (":type_outil", $_POST["type_outil"], PDO::PARAM_STR);
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

	function updateOutilMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE ouitllage 
					SET nom_outil = :nom_outil, type_outil = :type_outil, 
						libelle = :libelle
		 			WHERE code_cat = :code_cat";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":nom_outil", $_POST["nom_outil"], PDO::PARAM_STR);
        $resultat -> bindParam (":type_outil", $_POST["type_outil"], PDO::PARAM_STR);
        $resultat -> bindParam (":libelle", $_POST["libelle"], PDO::PARAM_STR);
        $resultat->execute();
	}

	function deleteOutilMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM outillage 
					WHERE code_cat = :code_cat";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":code_cat", $_POST["code_cat"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>