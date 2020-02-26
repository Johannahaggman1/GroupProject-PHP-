    <?php
    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    
    
    echo "<form method='POST' action='../Includes/writepost_functions.php'>";
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

