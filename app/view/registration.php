<?php

    //include("../Controller/clientController.php");
    
    if($_POST) 
    { 

      //addClientCtrl();
      echo '<pre>';
        print_r($_POST);
      echo '</pre>';
        echo $_POST["nom_cli"];
      $filtre = clean($_POST["nom_cli"]);
        echo $filtre;
    }



    // Inclusion du header se trouvant dans le dossier : app/view/inc/
    include("inc/header.inc.php");

?> 
<body>

    <?php
        // Inclusion du menu se trouvant dans le dossier : app/view/inc/
        include("inc/menu.inc.php");
    ?>

    <center> 

        <h1>Inscription</h1><br/> 

        <br/>
    
        <form action="" method="POST">

            <div class="form-group">

                <label>Nom :</label>
                <input class="form-control" type="text" name="nom_cli"/><br/><br/>

                <label>Prenom :</label>
                <input class="form-control" type="text" name="prenom_cli"/><br/><br/>

                <label>Adresse :</label>
                <input class="form-control" type="text" name="adresse_cli"/><br/><br/>

                <label>Code Postale :</label>
                <input class="form-control" type="text" name="cp_cli"/><br/><br/>

                <label>Email :</label>
                <input class="form-control" type="email" name="email_cli"/><br/><br/>

                <label>Ville :</label>
                <input class="form-control" type="text" name="ville_cli"/><br/><br/>

                <label>Tel :</label>
                <input class="form-control" type="text" name="tel_cli"/><br/><br/>

                <label for="agence">Dans quelle agence voulez-vous être affilié ? </label>
                <select name="code_ag" class="form-control" id="code_agence">
                    <option value="17">Paris</option>
                    <option value="18">Lyon</option>
                    <option value="19">Marseille</option>
                    <option value="20">Tours</option>
                    <option value="21">Nantes</option>
                    <option value="22">Montpellier</option>
                    <option value="23">Bordeaux</option>
                    <option value="24">Rouen</option>
                    <option value="25">Nice</option>
                </select><br/><br/> 

                <label>Mot de passe :</label>
                <input class="form-control" type="password" name="mdp_cli" /><br/><br/>

                <label>Confirmez mot de passe:</label>
                <input class="form-control" type="password" name="mdp_conf" /><br/><br/>

                <input class="form-control btn btn-primary" type="submit" value="Inscription"><br/><br/>

        </form> <!-- Fin form -->

    </center>

<?php

    include("inc/footer.inc.php");
?>
</body>
</html>
