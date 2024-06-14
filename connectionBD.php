<?php

$env = file_get_contents(__DIR__ . "/.env");
$lines = explode("\n", $env);
 
foreach ($lines as $line) {
    preg_match("/([^#]+)\=(.*)/", $line, $matches);
    if (isset($matches[2])) {
        putenv(trim($line));
    }
}
function connexion_bdd(): ?PDO
{
    // $nomDuServeur = "localhost";
    // $nomUtilisateur = "root";
    // $motDePasse = "root";
    // $nomBDD = "bdd_ifosup";

    try {

      $pdo = new PDO("mysql:host=" . getenv("DBHOST") . ";dbname=" . getenv("DBNAME") . ";charset=utf8", getenv("DBUSER"), getenv("DBPASSWORD"));
        // $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPASSWORD);
        // $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD", $nomUtilisateur, $motDePasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        throw $e;
    }
}