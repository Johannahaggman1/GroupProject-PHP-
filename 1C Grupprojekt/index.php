<?php
include('Includes/database_connections.php');

$page = (isset($_GET['page']) ? $_GET['page'] : '');


if($page == "login"){
    include("Views/login.php");
}

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

if($page == "writepost" && isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    include("Views/writepost.php");
}

echo (isset($_GET['login']) && $_GET['login'] == true ? "<center><a href='Includes/logout_functions.php'>Logga Ut</a></center>" : "");

?>

