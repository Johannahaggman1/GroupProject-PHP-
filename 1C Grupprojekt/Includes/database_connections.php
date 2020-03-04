<?php

// PHP SETTINGS
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "1c grupprojekt";

    // MAKE CONNECTION
    try {
        $dsn = "mysql:host=$host;dbname=$db;";
        $dbh = new PDO($dsn, $user, $pass);

    } catch(PDOException $e) {
        // ON ERROR
        echo "Error! ". $e->getMessage() ."<br />";
        die;
    }

    // Hur han på videon skrev: (kan kanske radera senare el använda) 
   //$conn = mysqli_connect("localhost", "root", "", "posts");

?>