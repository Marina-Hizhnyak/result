<?php 
require_once 'createNavigation.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription ?? '' ?>">
    <link rel="stylesheet" href="./assets/style.css">
    <title><?=$pageTitre ?? '' ?></title>
</head>
<body>
    <header>
        <nav>
           <ul>
                <?php echo createNavigation('index.php', 'Accueil'); ?>
                <?php echo createNavigation('contact.php', 'Contact'); ?>
                <?php echo createNavigation('autorisation.php', 'Connexion'); ?>
            </ul>
        </nav>
    </header>
    <main>
