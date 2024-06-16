
<?php
require 'functions.php';
require 'formRules.php';
require 'formRulesMethods.php';
require 'validate.php';
require_once 'connectionBD.php';

session_start();

$metaDescription = "Form registration";
$pageTitre = "Form registration";
include 'header.php';
 

if (isset($_SESSION['success']) && $_SESSION['success'] == true) {

    try
{
    // Instancier la connexion à la base de données.
    $pdo = connexion_bdd();
    // if (empty($resultValidate)){
    // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
    $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_motdepasse, uti_email) VALUES (:pseudo, :motdepasse, :email)";

    // Préparer la requête SQL.
    $stmt = $pdo->prepare($requete);
// print_r($_SESSION['connexion_pseudo']);
    // Lier les variables aux marqueurs :
        $stmt->bindValue(':pseudo', htmlspecialchars($_SESSION['connexion_pseudo']['value']), PDO::PARAM_STR);
        $stmt->bindValue(':motdepasse', htmlspecialchars($_SESSION['connexion_motDePasse']['value']), PDO::PARAM_STR);
        $stmt->bindValue(':email', htmlspecialchars($_SESSION['mail']['value']), PDO::PARAM_STR);
    // Exécuter la requête.
    $result = $stmt->execute();

    if ($result) {
    $code = rand(10000, 99999);

    $_SESSION['verify_identite']['code'] = $code;
    $_SESSION['verify_identite']['utiId'] = $pdo->lastInsertId();
    mail($_SESSION['mail']['value'], 'Code de vérification', "Votre code de vérification est : $code");
    header('Location: verification-identite.php?action=verification');
    exit;
}
    
    // }
}
catch(PDOException $e)
{
  
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
}

}
?>

  
<!-- Form registration -->
<h1>Form registration</h1>
  <?=$messageValidation ?? ''?>
<form action="regValidator.php" method="post">
<label for="login">Login</label>
<input type="text" name="connexion_pseudo" id="login">
        <small class="text-error">
			<?php if (isset($_SESSION['connexion_pseudo']['message'])) echo $_SESSION['connexion_pseudo']['message']; else echo '&nbsp;'; ?>
		</small>

<label for="mail">Email</label>
<input type="email" name="mail" id="mail">
<small class="text-error">
			<?php if (isset($_SESSION['mail']['message'])) echo $_SESSION['mail']['message']; else echo '&nbsp;'; ?>
		</small>

<label for="pass">Password</label>
<input type="password" name="connexion_motDePasse" id="pass">
        <small class="text-error">
			<?php if (isset($_SESSION['connexion_motDePasse']['message'])) echo $_SESSION['connexion_motDePasse']['message']; else echo '&nbsp;'; ?>
		</small>

    <label for="pass">Password confirmation</label>
<input type="password" name="pass" id="pass">
  <small class="text-error">
			<?php if (isset($_SESSION['connexion_motDePasse']['message'])) echo $_SESSION['connexion_motDePasse']['message']; else echo '&nbsp;'; ?>
		</small>

<input type="submit" value="Entrer" class="submit">
<p>
  autorisation - <a href="autorisation.php">autoriser</a>
</p>
</form>
<?php session_destroy();
 include 'footer.php'; 



?>



