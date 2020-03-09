<?php
    include('database_connections.php');
    //include('../Views/edit_post.php');

    session_start();

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];
//$userID = $_SESSION['id'];

$post_id = $_GET['post'];

    // updaterar/ändrar posts från databasen
$edit_post_query = "UPDATE posts SET title='$title', category='$category', 
description='$description', image='$image' WHERE id = $post_id";
$return = $dbh->exec($edit_post_query);
//die;

// om return inte körs kommer ett error medelande komma up.
if (!$return) {
    print_r($dbh->errorInfo());
    // annars kommer den att skicka användaren vidare till index.php(start sidan).
} else {
    header("location:../index.php?page=home");
}

?>