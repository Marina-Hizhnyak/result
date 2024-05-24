<?php
$metaDescription = "Form registration";
$pageTitre = "Form registration";
include 'header.php';
?>
  
<!-- Form registration -->
<h1>Form registration</h1>
<form action="" method="post">
<label for="login">Login</label>
<input type="text" name="login" id="login">
<label for="mail">Email</label>
<input type="email" name="mail" id="mail">
<label for="pass">Password</label>
<input type="password" name="pass" id="pass">
<label for="pass">Password confirmation</label>
<input type="password" name="pass" id="pass">
<input type="submit" value="Entrer" class="submit">
<p>
  autorisation - <a href="autorisation.php">autoriser</a>
</p>
</form>

<?php include 'footer.php'; ?>