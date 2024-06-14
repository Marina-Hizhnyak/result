<?php
$metaDescription = "User";
$pageTitre = "User";
require_once 'header.php';
require_once 'connectionBD.php';
require_once 'functions.php';
session_start();


$pdo = connexion_bdd();

$stmt = $pdo->prepare('SELECT * FROM t_utilisateur_uti WHERE uti_id = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();


 function deconnecter_utilisateur(){
$_SESSION =[];
 }

if (($_SERVER['REQUEST_METHOD'] == 'POST') && $_POST['deconnection'] == true) {
    deconnecter_utilisateur();
    header('Location: autorisation.php');
    exit();
}
// ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
  <h2>Profil</h2>
  <div class="form-flex">
  <div class="user-info">
    <p>Pseudo: <?= $user['uti_pseudo'] ?></p>
    <p>Email: <?= $user['uti_email'] ?></p>
  </div>
  <form class="form-profil" method="POST">
      <button name="deconnection" value="true" type="submit">Déconnexion</button>
  </form>
  </div>
</body>
</html>
<?php require_once 'footer.php'; ?>


