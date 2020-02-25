<?php 

    include("../Includes/database_connections.php");
?>


<form method="POST" action="../Includes/functions.php">

<b>Användarnamn:</b><br />
<input type="text" name="username" placeholder="Användarnamn"><br />
<b>Lösenord:</b><br />
<input type="password" name="password" placeholder="Lösenord"><br />
<br />
<input type="submit" name="login" value="Logga in">

</form>

<?php 

