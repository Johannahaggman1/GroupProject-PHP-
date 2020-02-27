
    <?php
    
 
    $order = 'desc';
    

    if (isset($_GET['post'])){
        //Blog Post
        $post_id = $_GET['post'];
        $query_post_data = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = $post_id";
        $return = $dbh->query($query_post_data);
        $row = $return->fetch(PDO::FETCH_ASSOC);
        //Blog Post Writer
        $query_username = "SELECT users.username FROM users JOIN posts ON posts.userID = users.id WHERE posts.id = $post_id";
        $return_username = $dbh->query($query_username);
        $row_username = $return_username->fetch(PDO::FETCH_ASSOC);
        //Blogg Comment
        $query_comments_amount = "SELECT id FROM comments WHERE postID=:post_id";
        $sth_comments_amount = $dbh->prepare($query_comments_amount);         
        $sth_comments_amount->bindParam(':post_id', $post_id);
        $return_comments_amount = $sth_comments_amount->execute();

            echo "<center>";
            echo "<h4>" . $row['title'] . "</h4>";
            echo "Författare: " . $row_username['username'] . "<br />";
            echo "Kategori: " . $row['category'] . "<br />";
            echo $row['description'] . "<br />";
            echo $row['image'] . "<br />";
            echo $row['date'];
            echo "</center>";

            
            if (isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                echo "<a href='index.php?post=$post_id'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
            }
            else{
                echo "<a href='index.php?post=$post_id&showcomments=true'>". $sth_comments_amount->rowCount() . " Kommentarer</a><hr />";
            }
            

            if(isset($_GET['showcomments']) && $_GET['showcomments'] == 'true'){
                include("Includes/comments_function.php");

                $comments = new GBPost($dbh);

                $comments->fetchAll($post_id);
                
                foreach($comments->getPosts() as $comments){
                echo "<b>Användare: </b>" .  $comments['username'] . "<br />";
                echo $comments['content'] . "<br />";
                echo $comments['date'] . "<br /><br />";

                }

                  if (isset($_SESSION['id']) && $_SESSION['id'] == true){
                    include('Views/comment.php');
                }  
                else{
                    echo "Logga in för att kommentera!";
                }
            }
    }

    

    $query_blogposts = "SELECT id, userID, title, description, category, image, date FROM posts ORDER BY date $order";
    $rows_posts = $dbh->query($query_blogposts);
    

    if(isset($_GET['post']) == true){
        while($row = $rows_posts->fetch(PDO::FETCH_ASSOC)){
            echo "<center>";
            echo '<a href="index.php">' . $row['title'] . "</a><br />";
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