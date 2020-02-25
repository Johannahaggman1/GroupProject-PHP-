<?php 

    include("../Includes/database_connections.php");
?>

<form method="POST" action="../Includes/login_functions.php">

<b>Användarnamn:</b><br />
<input type="text" name="username" placeholder="Användarnamn" required><br />
<b>Lösenord:</b><br />
<input type="password" name="password" placeholder="Lösenord" required><br />
<br />
<input type="submit" name="login" value="Logga in">

</form>

<?php 
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!" : "");
?>
