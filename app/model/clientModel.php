<?php
	
	// FONCTION PERMETTANT D'AJOUTER UNE AGENCE
	function addClientMdl()
	{
		// Inclusion du fichier contenant l'objet PDO pour éffectuer les requêtes
		include("../config/config.php");

		// Ceci est une requête préparée via :nomVariable,  permettant un peu plus de sécurité
		// En vérifiant le type de données avant son envoi en base de donnée
		$requete = "INSERT INTO clients (code_ag, nom_cli, prenom_cli, mdp_cli, 
								adresse_cli, cp_cli, email_cli, ville_cli, tel_cli) 
					VALUES (:code_ag, :nom_cli, :prenom_cli, :mdp_cli, 
						    :adresse_cli, :cp_cli, :email_cli, :ville_cli, :tel_cli)";

		// Préparation de la requête
		$inserer = $pdo -> prepare($requete);
		
		// Vérification du type de donnée envoyé en base et assignation à sa variable (valeur) correspondante
		$inserer -> bindParam (":code_ag", $code_ag, PDO::PARAM_INT);
        $inserer -> bindParam (":nom_cli", $nom_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":prenom_cli", $prenom_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":mdp_cli", $mdp_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":adresse_cli", $adresse_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":cp_cli", $cp_cli, PDO::PARAM_INT);
        $inserer -> bindParam (":email_cli", $email_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":ville_cli", $ville_cli, PDO::PARAM_STR);
        $inserer -> bindParam (":tel_cli", $tel_cli, PDO::PARAM_INT);

		echo "Dans le model addClient";
		/*
        if($inserer->execute())
        {
            $reussite = "<script>alert('Insertion réussie !!')</script>";
        }
        else
        {
            $erreur = "<script>alert('Insertion échouée !!')</script>";
		}
		*/
	}

	function showClientsMdl()
	{
		include("../inc/init.inc.php");

		$requete = "SELECT * FROM clients";
		$resultat = $pdo -> query($requete);
		$clients = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		
		if($clients->execute())
		{
			return $clients;
		}
	}

	function updateClientMdl($ref_cli)
	{
		include("../inc/init.inc.php");

		$requete = "UPDATE clients
					SET code_ag = :code_ag, nom_cli = :nom_cli, 
						prenom_cli = :prenom_cli, mdp_cli = :mdp_cli, adresse_cli = :adresse_cli, 
						cp_cli = :cp_cli, email_cli = :email_cli, ville_cli = :ville_cli, 
						tel_cli = :tel_cli
		 			WHERE ref_cli = :ref_cli";

		$resultat = $pdo -> prepare($requete);
        $resultat -> bindParam (":code_ag", $_POST["code_ag"], PDO::PARAM_INT);
		$resultat -> bindParam (":nom_cli", $_POST["nom_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":prenom_cli", $_POST["prenom_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":mdp_cli", $_POST["mdp_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":adresse_cli", $_POST["adresse_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":cp_cli", $_POST["cp_cli"], PDO::PARAM_INT);
        $resultat -> bindParam (":email_cli", $_POST["email_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":ville_cli", $_POST["ville_cli"], PDO::PARAM_STR);
        $resultat -> bindParam (":tel_cli", $_POST["tel_cli"], PDO::PARAM_INT);

	}

	function deleteClientMdl($ref_cli)
	{
		include("../inc/init.inc.php");
		$requete = "DELETE FROM clients 
					WHERE ref_cli = :ref_cli";

		$resultat -> $pdo -> prepare($requete);
		$resultat -> bindParam(":ref_cli", $_POST["ref_cli"], PDO::PARAM_INT);
		$resultat -> execute();
	}

?>