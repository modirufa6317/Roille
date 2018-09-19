<?php
    // Inclusion du header se trouvant dans le dossier : app/view/inc/
    include("inc/header.inc.php");
?>

<!-- Ouverture de la balise body -->
<body>

    <?php
        // Inclusion du menu se trouvant dans le dossier : app/view/inc/
        include("inc/menu.inc.php");
    ?> 
        <!-- Ouverture de la balise form -->
        <form method="POST" action="" onsubmit="return checkForm(this);">

            <div class="form-group">
                <label for="email">Votre E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="votreNom@example.com">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Mot de Passe</label>
                <input type="pasword" class="form-control" name="mdp" id="mdp" placeholder="Veuillez entrez un mot de passe sécurisé ">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Confirmation de mot de passe</label>
                <input type="password" class="form-control" name="mdp_conf" id="mdp_conf" placeholder="Veuillez entrez un mot de passe sécurisé">
            </div>


        <!-- Fermeture de la balise form -->     
        </form>

    <!-- Fermeture de la balise body -->   
    </body>

<!-- Fermeture de la balise html --> 
</html>

<?php

if($_POST){

    include("../controller/clientController.php");
    clientConnexionCtrl();
}

?>