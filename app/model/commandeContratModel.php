<?php
	
	// FONCTION PERMETTANT D'AJOUTER UNE AGENCE
	function addCommandeContratMdl()
	{
		include("../inc/init.inc.php");

		$requete = "INSERT INTO commandes_contrats (ref_cli, tarif_location, date_deb, date_fin, 
								montant_tva, montant_htc, montant_ttc) 
					VALUES (:ref_cli, :tarif_location, :date_deb, :date_fin, 
								:montant_tva, :montant_htc, :montant_ttc)";

		$inserer = $pdo -> prepare($requete);
		$inserer -> bindParam (":ref_cli", $_POST["ref_cli"], PDO::PARAM_INT);
        $inserer -> bindParam (":tarif_location", $_POST["tarif_location"], PDO::PARAM_INT);
        $inserer -> bindParam (":date_deb", $_POST["date_deb"], PDO::PARAM_STR);
        $inserer -> bindParam (":date_fin", $_POST["date_fin"], PDO::PARAM_STR);
        $inserer -> bindParam (":montant_tva", $_POST["montant_tva"], PDO::PARAM_INT);
        $inserer -> bindParam (":montant_htc", $_POST["montant_htc"], PDO::PARAM_INT);
        $inserer -> bindParam (":montant_ttc", $_POST["montant_ttc"], PDO::PARAM_INT);

        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
        }
	}

	function showMontantsContratsMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * FROM montants_contrats";
		$resultat = $pdo -> query($requete);
		$montants_contrats = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		
		if($montants_contrats->execute())
		{
			return $montants_contrats;
		}
	}

	function updateMontantContratMdl()
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE montants_contrats
					SET ref_cli = :ref_cli, tarif_location = :tarif_location, 
						date_deb = :date_deb, date_fin = :date_fin, montant_tva = :montant_tva, 
						montant_htc = :montant_htc, montant_ttc = :montant_ttc
		 			WHERE ref_comct = :ref_comct";

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindParam (":ref_cli", $_POST["ref_cli"], PDO::PARAM_INT);
        $resultat -> bindParam (":tarif_location", $_POST["tarif_location"], PDO::PARAM_INT);
        $resultat -> bindParam (":date_deb", $_POST["date_deb"], PDO::PARAM_STR);
        $resultat -> bindParam (":date_fin", $_POST["date_fin"], PDO::PARAM_STR);
        $resultat -> bindParam (":montant_tva", $_POST["montant_tva"], PDO::PARAM_INT);
        $resultat -> bindParam (":montant_htc", $_POST["montant_htc"], PDO::PARAM_INT);
        $resultat -> bindParam (":montant_ttc", $_POST["montant_ttc"], PDO::PARAM_INT);

        if($resultat->execute())
        {
            $reussite = "<script>alert('Mise à jour réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Mise à jours échouée !!')</script>";
        }

	}

	function deleteMontantsContratsMdl()
	{
		include("../inc/init.inc.php");
		$requete = "DELETE FROM montants_contrats 
					WHERE ref_comct = :ref_comct";

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":ref_comct", $_POST["ref_comct"], PDO::PARAM_INT);
		$resultat -> execute();
	}

?>