<?php include("database_connections.php");

session_start();

$user_id=$_SESSION['id'];
$content=$_POST['content'];
$post_id=$_POST['post_id'];

// skriver in data för kommentarer.
$query_comment="INSERT INTO comments(userID, content, postID) VALUES (:user_id, :content, :post_id);";
$sth=$dbh->prepare($query_comment);
$sth->bindParam(':user_id', $user_id);
$sth->bindParam(':content', $content);
$sth->bindParam(':post_id', $post_id);
$return=$sth->execute();

// error medelande.
if ( !$return) {
    print_r($dbh->errorInfo());
}

else {
    header("location:../index.php?post=$post_id&showcomments=true");
}

?>