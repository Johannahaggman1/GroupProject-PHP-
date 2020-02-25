<?php
session_start();
echo (isset($_SESSION['username']) ? "Inloggad som: " . $_SESSION['username'] : '');
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
    
    echo (isset($_SESSION['username']) ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

    
?>
    <center><h1>BLOGGEN</h1></center>
    
    <?php
    include('Views/show_posts.php');

    ?>

    <form method="POST" action="index.php?page=login">
    <button type="submit">Logga In</button>
    </form>
    <form method="POST" action="index.php?page=signup">
    <button type="submit">Registrera</button>
    </form>
    

<a href=""></a>


</body>
</html>