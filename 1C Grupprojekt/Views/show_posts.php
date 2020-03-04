
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
        $query_comments_amount ="SELECT posts.id, COUNT(posts.id) FROM posts JOIN comments on comments.postID = posts.id GROUP BY posts.id";



        echo "<center>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "Författare: " . $row_username['username'] . "<br />";
            echo "Kategori: " . $row['category'] . "<br />";
            echo $row['description'] . "<br />";
            
            echo "<img src='uploads/" . $row['image'] . "'> <br />";
            echo $row['date'];
            echo "</center>";

            echo "<a href='index.php?post=$post_id&showcomments=true'>Kommentarer</a><hr />";
            
            // 

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo "<a href=\"index.php?action=delete&id=" . $post_id ."\"> Delete! </a>";
                
                }
            
                if(isset($_GET['action']) && $_GET['action'] == "delete") {
            
                    $id = (!empty($_GET['id']) ? $_GET['id'] : "");
                    $query = "DELETE FROM posts WHERE id=" . $_GET['id'];
                    $return = $dbh->exec($query);
                    
                
                    header('location:index.php');
                
                }
            

            if(isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                echo "Hej";
                
            }
    }

    //TEST DELETE 

/*     if(isset($_GET['action']) && $_GET['action'] == "delete") {
        //echo "Delete! <br />";
        $id_ = (!empty($_GET['id']) ? $_GET['id'] : "");
        $queary = "DELETE FROM posts WHERE id ='".$id ."'";
        $exequte = $dbh->exec($queary);
        header("location:exempel.php");

    }  */

    // 

    $query_blogposts = "SELECT id, userID, title, description, category, image, date FROM posts ORDER BY date $order";
    $rows_posts = $dbh->query($query_blogposts);
    

    
    while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
        echo "<center>";
        echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
        echo "</center>";
        
    }
    
 

    ?>

    <img src="../uploads/."  alt="">