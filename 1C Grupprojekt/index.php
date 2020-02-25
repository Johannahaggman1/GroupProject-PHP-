<?php

session_start();
echo (isset($_SESSION['username']) ? "Välkommen " . $_SESSION['username'] : '');


if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    echo "<center>Du är admin!!</center>";  
    echo "<a href='Views/writepost.php'>Skriv nytt inlägg</a>";
}



echo (isset($_GET['login']) && $_GET['login'] == true ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>BLOGGEN</h1></center>

    <form method="POST" action="views/login.php">
    <button type="submit">Logga In</button>
    </form>
    <form method="POST" action="views/signUp.php">
    <button type="submit">Registrera</button>
    </form>
    
</body>
</html>