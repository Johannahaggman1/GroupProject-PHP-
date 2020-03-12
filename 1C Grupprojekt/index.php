<?php
// kopplar indexen med database filen(som är kopplad till en local databas).
include('Includes/database_connections.php');

// variabel som säger att om "page" för sidan är satt eller inte och att scripten startar efter ?.
$page = (isset($_GET['page']) ? $_GET['page'] : '');

// om variabeln page skrivs ut kommer den att ta koden från login.php.
if($page == "login"){
    include("Views/login.php");
}
// om variabeln inte kommer skrivs ut kommer den att ta koden från home.php.
if(!$page){
    include("Views/home.php");
}

if($page == "editpost"){
    include("Views/edit_post.php");
}

if($page == "signup"){
    include("Views/signUp.php");
}

if($page == "home"){
    include("Views/home.php");
}
// om page är det samma som writepost finns och om role är satt samt att den är satt till admin...
if($page == "writepost" && isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    // kommer den att skriva ut writepost.
    include("Views/writepost.php");
}

// skriver ut om login filen är sann. Gör sedan en länk för logga ut.
echo (isset($_GET['login']) && $_GET['login'] == true ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

?>