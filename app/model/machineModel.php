<?php

	function showMachinesMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from machines";
		$resultats = $pdo -> prepare($requete);
		$machines = $resultats -> fetchAll(PDO::FETCH_ASSOC);

		$machines -> execute();
	}

	function addMachineMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO machines (nom_machine, type_machine, libelle) 
					VALUES (:nom_machine, :type_machine, :libelle)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":nom_machine", $_POST["nom_machine"], PDO::PARAM_STR);
        $inserer -> bindParam (":type_machine", $_POST["type_machine"], PDO::PARAM_STR);
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

	function updateMachineMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE machines 
					SET nom_machine = :nom_machine, type_machine = :type_machine,
					 libelle = :libelle
		 			WHERE code_cat = :code_cat";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":nom_machine", $_POST["nom_machine"], PDO::PARAM_STR);
        $resultat -> bindParam (":type_machine", $_POST["type_machine"], PDO::PARAM_STR);
        $resultat -> bindParam (":libelle", $_POST["libelle"], PDO::PARAM_STR);

        $resultat->execute();
	}

	function deleteMachineMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM machines 
					WHERE code_cat = :code_cat";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":code_cat", $_POST["code_cat"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>