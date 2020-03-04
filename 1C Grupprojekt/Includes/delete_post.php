<?php
include("database_connections.php");
include("show_posts.php");

$post_id = $_GET['post'];

$query = "DELETE from posts where id =:id";
$sth = $dbh->prepare($query);
$sth->bindParam(':id', $post_id);
$return = $sth->execute();

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php");
}

?>