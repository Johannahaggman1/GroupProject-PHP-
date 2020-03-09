<?php
include("database_connections.php");


$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$query_check_username = "SELECT username FROM users WHERE username = :username";
$sth_check_username = $dbh->prepare($query_check_username);
$sth_check_username->bindParam(':username', $username);
$return_username = $sth_check_username->execute();

$query_check_email = "SELECT email FROM users WHERE email = :email";
$sth_check_email = $dbh->prepare($query_check_email);
$sth_check_email->bindParam(':email', $email);
$return_email = $sth_check_email->execute();

$result_username = count($sth_check_username->fetchAll());
$result_email = count($sth_check_email->fetchAll());
        if ($result_username > 0){
            echo "AJABAJA! Användarnamnet är redan taget, Försök igen!<br />";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
         } 
         else if ($result_email > 0){
            echo "AJABAJA! Endast ett konto per mail, Försök igen!<br />";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
         }
         else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "fel email format";
            echo "fuck you bish!";
            echo "<a href='../index.php?page=signup' >Tillbaka</a>";
        }
         
         else {
            $query_register_user = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email);";
            $sth_register_user = $dbh->prepare($query_register_user);
            $sth_register_user->bindParam(':username', $username);
            $sth_register_user->bindParam(':password', $password);
            $sth_register_user->bindParam(':email', $email);
            $return_register_user = $sth_register_user->execute();

            if (!$sth_register_user){

            print_r($dbh->errorInfo());
            } else{
            header("location:../index.php?registered=true");
            
                }
         }
?>