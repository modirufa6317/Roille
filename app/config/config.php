<?
// CE FICHIER CONTIENT LES PARAMETERES ET LA CONNEXION A LA BDD
// A REVOIR SONT CONTENU POUR DES QUESTIONS DE SECURITE

// Cette variable correspond aux options de connexion à la BDD
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_EMULATE_PREPARES => true
);


//Les paramètres de connexion à la base de données
$host = 'localhost';
$database = 'roille';
$username = 'root';
$password = '';

// Connexion à la base de donnée via l'objet PDO
$pdo = new PDO("mysql:host=".$host.";dbname=".$database, $username,$password,$options);

?>