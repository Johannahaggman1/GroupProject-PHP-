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

    // update 
$edit_post_query = "UPDATE posts SET title=:title, category=:category, 
description=:description, image=:image WHERE id = :post_id";
$sth_update_post = $dbh->prepare($edit_post_query);
$sth_update_post->bindParam(':title', $title);
$sth_update_post->bindParam(':category', $category);
$sth_update_post->bindParam(':description', $description);
$sth_update_post->bindParam(':image', $image);
$sth_update_post->bindParam(':post_id', $post_id);
$return_update_post = $sth_update_post->execute();
//die;


if (!$return_update_post) {
    print_r($dbh->errorInfo());
    // annars kommer den att skicka användaren vidare till index.php(start sidan).
} else {
    header("location:../index.php?page=home");
}

?>