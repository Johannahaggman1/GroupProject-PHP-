<?php

session_start();
    //skriver ut användarens namn på första sidan.
    echo (isset($_SESSION['username']) ? "Inloggad som: " . $_SESSION['username'] : '');
    
    // kollar om användaren är admin.
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
        echo "<center>Du är admin!!</center>";
        echo "<center><a href='Views/writepost.php'>Skirv Inlägg</a></center>"  ;


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // länk till logga ut fil.
    echo (isset($_SESSION['username']) ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

?>


    <center><marquee behavior="spin" direction="right"><h1>BLOGGEN</h1></marquee></center>
    
    <?php
    // visar posts på sidan.
    include('Views/show_posts.php');

    ?>

    <?php
        if (!isset($_SESSION['id'])){
    ?>
    <form method="POST" action="index.php?page=login">
    <button type="submit">Logga In</button>
    </form>
    
    <form method="POST" action="index.php?page=signup">
    <button type="submit">Registrera</button>
    </form>
    <?php } ?>

    <?php
    if (isset($_GET['registered']) && $_GET['registered'] == 'true'){
        echo "Du är nu registrerad!";
    }
    ?>
    

<a href=""></a>


</body>
</html>