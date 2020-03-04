    <?php
    session_start();

    //
/*     include("database_connections.php");
    
    // Prov image upload 27feb
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $sqlImg = "SELECT image FROM posts WHERE id='$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                    echo "<div>";
                    if ($rowImg['image'] == 0){
                        echo "<img src='uploads/".$id.".jpg'>";
                    }
                    echo "</div>";
                }
            }
        }
    //  */

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    
    
    echo "<form method='POST' action='../Includes/writepost_functions.php' enctype='multipart/form-data'>";
    echo "<b>Titel:</b><br />";
    echo "<input type='text' name='title' required><br />";
    echo "<br />";
    echo "<b> Kategori: </b> <br />";
    echo "<select name='category' id='category'>";
    echo "<option value='Välj'>Välj Kategori..</option>";
    echo "<option value='Ideer'>Företaget</option>";
    echo "<option value='Nyheter'>Nyheter</option>";
    echo "<option value='Produkter'>Produkter</option>";
    echo "<option value='Tyck till'>Tyck till</option>";
    echo "</select>";
    echo "<br />";
    echo "<br />";
    echo "<b> Inlägg: </b> <br />";
    echo "<textarea name='description' cols='60' rows='10' placeholder='Skriv ditt inlägg här..' required></textarea><br />";
    echo "<br />";
    echo "<b>Bifoga bild:</b><br />";
    echo "<input type='file' name='file' id='fileToUpload' /><br />";
    echo "<br />";
    echo "<input type='submit' name='submit' value='Publicera' />";
    echo "<br />";
    echo "</form>";
}

else{
    echo "ajabaja inga hackerattacker här inte!";
}
?>

