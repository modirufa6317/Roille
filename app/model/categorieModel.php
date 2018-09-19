<?php

	function showICategoriesMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * from categories";
		$resultats = $pdo -> prepare($requete);
		$categories = $resultats -> fetchAll(PDO::FETCH_ASSOC);

		$categories -> execute();
	}

	function addCategorieMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO categories (libelle) 
					VALUES (:libelle)";

		$inserer = $pdo -> prepare($requete);
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

	function updateCategorieMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE categories 
					SET libelle = :libelle
		 			WHERE code_cat = :code_cat";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":libelle", $_POST["libelle"], PDO::PARAM_STR);
        $resultat->execute();
	}

	function deleteCategorieMdl()
	{
		include("../inc/init.inc.php");

		$requete = "DELETE FROM categories 
					WHERE code_cat = :code_cat";

		$resultat -> $pdo -> prepare($requete);

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":code_cat", $_POST["code_cat"], PDO::PARAM_INT);
		$resultat -> execute();

	}
?>