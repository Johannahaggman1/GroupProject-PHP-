<?php 
include("database_connections.php");

session_start();

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];
$userID = $_SESSION['id'];

$query_post = "INSERT INTO posts(userID, title, category, description, image) VALUES ('$userID', '$title', '$category', '$description', '$image');";
$return = $dbh->exec($query_post);

if (!$return) {
    
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?page=home");
}