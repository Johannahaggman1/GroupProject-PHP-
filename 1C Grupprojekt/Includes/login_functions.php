<?php
//LOGIN

include("database_connections.php");

// variablar
$username = $_POST['username'];
$password = md5($_POST['password']);

// checkar med databasen om datan finns som skrivs in.
$query = "SELECT id, username, password, email, role FROM users where username = :username AND password = :password";
$sth_login = $dbh->prepare($query);
$sth_login->bindParam(':username', $username);
$sth_login->bindParam(':password', $password);
$return_login = $sth_login->execute();
$row = $sth_login->fetch(PDO::FETCH_ASSOC);

// om det inte finns i databasen kommer den att skicka användaren login error
if(empty($row)){
    header("location:../views/login.php?err=true");
}
    // annars kommer den att skvia ut användaren.(logain användaren).
    else{
        session_start();
        $_SESSION['id'] =$row['id'];
        $_SESSION['username'] =$row['username'];
        $_SESSION['password'] =$row['password'];
        $_SESSION['email'] =$row['email'];
        $_SESSION['role'] =$row['role'];
        header("location:../index.php");
    }

?>