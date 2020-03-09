<?php

    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){

    $post_id = $_GET['post'];
    $update_post_query = "SELECT id, userID, title, description, category, image, date FROM posts WHERE id = $post_id;";
    //$edit_post_query = "UPDATE posts SET title='$_POST[title]', description='$_POST[description]', WHERE id = $post_id;"; 
    $return_edit_post = $dbh->query($update_post_query);
    $row_edit_post = $return_edit_post->fetch(PDO::FETCH_ASSOC);

    echo "<form method='POST' action='Includes/edit_post_functions.php?post=$post_id'>";
    echo "<b>Titel:</b><br />";
    echo "<input type='text' name='title' value='" . $row_edit_post['title'] ."' required><br />";
    echo "<br />";
    echo "<b> Kategori: </b> <br />";
    echo "<select name='category' id='category value='" . $row_edit_post['category'] . "' required>";
    echo "<option value='' disabled selected>Välj Kategori</option>";
    echo "<option value='Ideer'>Företaget</option>";
    echo "<option value='Nyheter'>Nyheter</option>";
    echo "<option value='Produkter'>Produkter</option>";
    echo "<option value='Tyck till'>Tyck till</option>";
    echo "</select>";
    echo "<br />";
    echo "<br />";
    echo "<b> Inlägg: </b> <br />";
    echo "<textarea name='description' cols='60' rows='10' required>" . $row_edit_post['description'] . "</textarea><br />";
    echo "<br />";
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='image' id='fileToUpload'><br />";
    echo "<br />";
    echo "<input type='submit' value='Publicera' />";
    echo "<br />";
    echo "</form>";

    }

    else{
    echo "ajabaja inga hackerattacker här inte!";
    }
?>

