<?php
require 'formRules.php';
require 'formRulesMethods.php';
require 'validate.php';
require_once 'connectionBD.php';
require_once 'functions.php';

session_start();
$metaDescription = "Form autorisation";
$pageTitre = "Form autorisation";
include 'header.php';

if (isset($_SESSION['success']) && $_SESSION['success'] == true) {
    try {
        $pdo = connexion_bdd();
        $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo";
        $stmt = $pdo->prepare($requete);
        $stmt->bindValue(':pseudo', $_SESSION['connexion_pseudo']['value'], PDO::PARAM_STR);
        $estValide = $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erreur d'exécution de requête : " . $e->getMessage());
        echo "Une erreur est survenue. Veuillez réessayer plus tard.";
    }

    if (isset($estValide) && $estValide !== false) {
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($utilisateur);
        if (($_SESSION['connexion_motDePasse']['value']==$utilisateur['uti_motdepasse'])) {
            // Rediriger vers profil.php après une connexion réussie
            $_SESSION['user_id'] = $utilisateur['uti_id'];
            header('Location: profil.php');
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
}


?>

<h1>Form autorisation</h1>
<?=$messageValidation ?? ''?>
<form action="authValidator.php" method="post">
    <label for="login">Login</label>
    <input type="text" name="connexion_pseudo" id="login">
    <small class="text-error">
        <?= $_SESSION['connexion_pseudo']['message'] ?? '&nbsp;' ?>
    </small>
    <label for="pass">Password</label>
    <input type="password" name="connexion_motDePasse" id="pass">
    <small class="text-error">
        <?= $_SESSION['connexion_motDePasse']['message'] ?? '&nbsp;' ?>
    </small>
    <input type="submit" value="Entrer" class="submit">
    <p>
        registration - <a href="registration.php">registrer</a>
    </p>
</form>
<?php
session_unset();
session_destroy();
include 'footer.php';
?>



