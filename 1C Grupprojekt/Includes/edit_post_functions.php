<?php
    include('database_connections.php');
    //include('../Views/edit_post.php');

    session_start();

$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];
$image = $_POST['image'];
$userID = $_SESSION['id'];

//$post_id = $_POST['post'];

    // update 
$edit_post_query = "UPDATE posts SET title='$_POST[title]', description='$_POST[description]', image='$_POST[image]';";
$return = $dbh->exec($edit_post_query);

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?page=home");
}

?>