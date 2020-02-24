<?php

    include("Includes/database_connections.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

    <center>
    <h1>Registrera</h1>
    
    <form method="POST" action="signUp.php">
        <input type="text" name="username" placeholder="Skapa användarnamn...">
        <br>
        <input type="password" name="password" placeholder="Skapa Lösenord...">
        <br>
        <input type="text" name="email" placeholder="Skriv din mail...">
        <br>
        <button type="submit" name="submit">Skapa</button>
    </form>
    </center>

    <?php
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$query_check_user = $dbh->query("SELECT username, email FROM users WHERE username = '$username'AND email ='$email'");

$result = count($query_check_user->fetchAll());
        if ($result > 0){
            echo "AJABAJA! Användarnamnet är redan taget, Försök igen!<br />";
            echo "<a href='signUp.php' >Tillbaka</a>";
         } else {
            $query = "INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email');";
            $return = $dbh->exec($query);

            if (!$return){

            print_r($dbh->errorInfo());
            } else{
            header("location:index.php?created=true");
                }
         }
?>
</body>
</html>