<?php

session_start();
echo (isset($_SESSION['username']) ? "Välkommen " . $_SESSION['username'] : '');


?>