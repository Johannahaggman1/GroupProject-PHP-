<?php
//LOGIN

include("database_connections.php");


$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT id, username, password, email, role FROM users where username = :username AND password = :password";
$sth_login = $dbh->prepare($query);
$sth_login->bindParam(':username', $username);
$sth_login->bindParam(':password', $password);
$return_login = $sth_login->execute();
$row = $sth_login->fetch(PDO::FETCH_ASSOC);

if(empty($row)){
    header("location:../views/login.php?err=true");
}
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