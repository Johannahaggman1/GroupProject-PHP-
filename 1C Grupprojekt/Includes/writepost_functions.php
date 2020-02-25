<?php 
include("database_connections.php");

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];

$query_post = "INSERT INTO posts(title, category, description, image, date) VALUES ('$title', '$category', '$description', '$image');";
$return = $dbh->exec($query_post);

if (!$return) {
    
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?page=home");
}