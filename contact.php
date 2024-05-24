<?php 
session_start();

$metaDescription = "Contact";
$pageTitre = "Contact";
include 'header.php';

 if (isset($_SESSION['success']))  
$messageValidation = "<p class='success'>le formulaire a bien été envoyée!</p>";

?>
<form action="formValidator.php" method="post">
    <h1 class="title-form">Contact</h1>
    <?=$messageValidation ?? ''?>
    <div class="groupe">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php if (isset($_SESSION['nom'])) echo $_SESSION['nom']['value']; else echo ''; ?>">
        <small class="text-error">
			<?php if (isset($_SESSION['nom']['message'])) echo $_SESSION['nom']['message']; else echo '&nbsp;'; ?>
		</small>
    </div>
    <div class="groupe">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php if (isset($_SESSION['prenom'])) echo $_SESSION['prenom']['value']; else echo ''; ?>">
        <small class="text-error">
			<?php if (isset($_SESSION['prenom']['message'])) echo $_SESSION['prenom']['message']; else echo '&nbsp;'; ?>
		</small>        
     </div>
    <div class="groupe">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']['value']; else echo ''; ?>">
        <small class="text-error">
			<?php if (isset($_SESSION['email']['message'])) echo $_SESSION['email']['message']; else echo '&nbsp;'; ?>
		</small>	   
     </div>
    <div class="groupe">
        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php if (isset($_SESSION['message'])) echo $_SESSION['message']['value']; else echo ''; ?></textarea>
        <small class="text-error">
			<?php if (isset($_SESSION['message']['message'])) echo $_SESSION['message']['message']; else echo '&nbsp;'; ?>
		</small>
    </div>
         <input class="submit" type="submit" value="Envoyer">
    
</form>

<?php
if (isset($_SESSION['success'])) {
   ?>
   <script>
      setTimeout("alert('The Form has been sent succesfully!')", 500);
   </script> 
   <?php
}
?>

<?php session_destroy(); include 'footer.php'; ?>

