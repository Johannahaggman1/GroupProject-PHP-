
    <?php

 
    $order = 'desc';
    

    if (isset($_GET['post'])){

        $post_id = $_GET['post'];
        $query_post_data = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = $post_id";
        $return = $dbh->query($query_post_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);
        $query_username = "SELECT users.username FROM users JOIN posts ON posts.userID = users.id WHERE posts.id = $post_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);


        echo "<center>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "Författare: " . $row_username['username'] . "<br />";
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