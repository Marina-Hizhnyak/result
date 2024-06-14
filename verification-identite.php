<?php
require 'functions.php';
require_once 'connectionBD.php';
include 'header.php';
session_start();

if ($_GET['action']='verification'){
      $message = 'Un code de vérification a été envoyé par email.';
} else {
      $message = '';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_SESSION['verify_identite']['code'] == $_POST['verification_code']){
            $pdo = connexion_bdd();
            $stmt = $pdo->prepare('UPDATE t_utilisateur_uti SET uti_compte_active = 1 WHERE uti_id = ?');
            $stmt->execute([$_SESSION['verify_identite']['utiId']]);
            $_SESSION['user_id'] = $_SESSION['verify_identite']['utiId'];
            unset($_SESSION['verify_identite']);
            header('Location: profil.php');
            exit;
        } else {
             $message = 'Code de vérification incorrect.';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification d'identité</title>
</head>
<body>
<h2>Vérification d'identité</h2>
<?php if (!empty($message)) : ?>
    <p><?= $message ?></p>
<?php endif; ?>
<form method="POST">
    <label>Code de vérification:</label>
    <input type="text" name="verification_code" required minlength="5" maxlength="5">
    <button type="submit">Vérifier</button>
</form>

</body>
</html>
<?php
 include 'footer.php'; 
?>