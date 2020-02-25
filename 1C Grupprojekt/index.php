<?php
include('Includes/database_connections.php');
session_start();
echo (isset($_SESSION['username']) ? "Välkommen " . $_SESSION['username'] : '');


if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    echo "<center>Du är admin!!</center>";  


}



echo (isset($_GET['login']) && $_GET['login'] == true ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>BLOGGEN</h1></center>
    <?php
    $order = 'desc';
    

    if (isset($_GET['post'])){

        $post_id = $_GET['post'];
        $query_post_data = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = $post_id";

        $return = $dbh->query($query_post_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);

        echo "<center>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "Kategori: " . $row['category'] . "<br />";
            echo $row['description'] . "<br />";
            echo $row['image'] . "<br />";
            echo $row['date'] . "<hr />";
            echo "</center>";
    }

    $query_blogposts = "SELECT id, userID, title, description, category, image, date FROM posts ORDER BY date $order";
    $rows_posts = $dbh->query($query_blogposts);
    

    
    while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
        echo "<center>";
        echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
        echo "</center>";
        
    }
    

    ?>

    <form method="POST" action="views/login.php">
    <button type="submit">Logga In</button>
    </form>
    <form method="POST" action="views/signUp.php">
    <button type="submit">Registrera</button>
    </form>
    

<a href=""></a>


</body>
</html>