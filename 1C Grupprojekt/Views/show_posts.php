
    <?php
    
    // gör en variabel med namnet order med värder desc(desending).
    $order = 'desc';
    
    // om post är satt...
    if (isset($_GET['post'])){
        // Hämta post function
        $post_id = $_GET['post'];
        $query_post_data = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = :post_id";
        $sth_post_data = $dbh->prepare($query_post_data);
        $sth_post_data->bindParam(':post_id', $post_id);
        $return = $sth_post_data->execute();
        $row = $sth_post_data->fetch(PDO::FETCH_ASSOC);

        //Hämta användare function
        $query_username = "SELECT users.username FROM users JOIN posts ON posts.userID = users.id WHERE posts.id = :post_id";
        $sth_username = $dbh->prepare($query_username);
        $sth_username->bindParam(':post_id', $post_id);
        $return_username = $sth_username->execute();
        $row_username = $sth_username->fetch(PDO::FETCH_ASSOC);

        //Hämta kommentarer funktion
        $query_comments_amount = "SELECT id FROM comments WHERE postID=:post_id";
        $sth_comments_amount = $dbh->prepare($query_comments_amount);         
        $sth_comments_amount->bindParam(':post_id', $post_id);
        $return_comments_amount = $sth_comments_amount->execute();

            //skriv ut post
            echo "<center>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "Författare: " . $row_username['username'] . "<br />";
            echo "Kategori: " . $row['category'] . "<br />";
            echo $row['description'] . "<br />";
            echo "<img src='uploads/" . $row['image'] . "'><br />";
            echo $row['date'];
            echo "</center>";
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            echo "<center><button><a href='index.php?page=editpost&post=" . $post_id . "'>Redigera inlägg</a></button></center>";
            echo "</br>";
            echo "<center><button><a href='Includes/delete_post.php?post=" . $post_id . "'>Ta bort inlägg</a></button></center>";
            echo "</br>";
            }

            
            // visar kommentarer samt döljer kommentarer on click. visar också allt som finns inuti showcomments.
            if (isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                echo "<a href='index.php?post=$post_id'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
                // inkluderar comments_function.php filen som insertar datan som skrivs in i text fältet.
                include("Includes/comments_function.php");

                $comments = new GBPost($dbh);

                $comments->fetchAll($post_id);
                
                foreach($comments->getPosts() as $comments){
                echo "<b>Användare: </b>" .  $comments['username'] . "<br />";
                echo $comments['content'] . "<br />";
                echo $comments['date'] . "<br />";
                
                // kollar att användaren är admin.
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    echo "<a href='Includes/delete_comment.php?post=" . $post_id . "&id=" . $comments['id'] . "'>Ta Bort</a><br />";
                }

                }
                    // kollar vilken id kommentaren har.
                    if (isset($_SESSION['id']) && $_SESSION['id'] == true){
                        include('Views/comment.php');
                }  
                else{
                    echo "Logga in för att kommentera!";
                }
            
            }
            else{
                echo "<a href='index.php?post=$post_id&showcomments=true'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
            }
    }

    
    // gör en query som väljer all data inuti posts som därefter ordnas med hjälp av datum.
    $query_blogposts = "SELECT id, userID, title, description, category, image, date FROM posts ORDER BY date $order";
    $rows_posts = $dbh->query($query_blogposts);
    
    // gör en länk till start sidan och url:n visar post id:et samt titeln för post.
    if(isset($_GET['post']) == true){
        while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
            echo "<center>";
            echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
            echo "</center>";
        }     
    } else {
        while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
            echo "<center>";
            echo '<a href="index.php?post='.$row["id"].'">' . $row['title'] . "</a><br />";
            echo "</center>";
        
    }
}

    ?>