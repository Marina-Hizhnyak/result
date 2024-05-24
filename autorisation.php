<?php
require 'formRules.php';
require 'formRulesMethods.php';
require 'validate.php';
session_start();

$metaDescription = "Form autorisation";
$pageTitre = "Form autorisation";
include 'header.php';
 

function connexion_bdd(): ?PDO
{
$nomDuServeur = "localhost";
$nomUtilisateur = "root";
$motDePasse = "root";
$nomBDD = "bdd_ifosup";

    try
    {
        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD", $nomUtilisateur, $motDePasse);

        // Définir le mode d'erreur sur "exception".
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // Afficher un message de succès.
        echo "Connexion réussie à la base de données";
        // Retourner l'objet PDO après la connexion.
        return $pdo;
    }
    catch(PDOException $e)
    {
        // Relancer l'exception pour qu'elle soit capturée par le bloc "try/catch" parent.
        throw $e;
    }
}

// var_dump($_SERVER['REQUEST_METHOD']);



if (isset($_SESSION['success']) && $_SESSION['success'] == true) {

    try
{
    // Instancier la connexion à la base de données.
    $pdo = connexion_bdd();

    // if (empty($resultValidate)){
    // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
    $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_motdepasse) VALUES (:pseudo, :motdepasse)";

    // Préparer la requête SQL.
    $stmt = $pdo->prepare($requete);
// print_r($_SESSION['connexion_pseudo']);
    // Lier les variables aux marqueurs :
    $stmt->bindValue(':pseudo', $_SESSION['connexion_pseudo']['value'], PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $_SESSION['connexion_motDePasse']['value'], PDO::PARAM_STR);
  
    // Exécuter la requête.
    $stmt->execute();
    // }
}
catch(PDOException $e)
{
  
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
}



// function setSessionFieldsValue($values) {
//     foreach ($values as $key => $value) {
//        $_SESSION[$key]['value'] = $_POST[$key]; 
//     } 
// }


}
?>


  
<!-- Form autorisation -->
<h1>Form autorisation</h1>
  <?=$messageValidation ?? ''?>
<form action="authValidator.php" method="post">
<label for="login">Login</label>
<input type="text" name="connexion_pseudo" id="login">
        <small class="text-error">
			<?php if (isset($_SESSION['connexion_pseudo']['message'])) echo $_SESSION['connexion_pseudo']['message']; else echo '&nbsp;'; ?>
		</small>
<label for="pass">Password</label>
<input type="password" name="connexion_motDePasse" id="pass">
        <small class="text-error">
			<?php if (isset($_SESSION['connexion_motDePasse']['message'])) echo $_SESSION['connexion_motDePasse']['message']; else echo '&nbsp;'; ?>
		</small>
<input type="submit" value="Entrer" class="submit">
<p>
  registration - <a href="registration.php">registrer</a>
</p>
</form>
<?php session_destroy();
 include 'footer.php'; 



?>



