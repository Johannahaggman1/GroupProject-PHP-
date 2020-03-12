<?php 
include("database_connections.php");

session_start();

//PROV - IMG
 
 if (isset($_POST['submit'])) {
    $file = $_FILES['file']['name'];

    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_POST['file'];
    $userID = $_SESSION['id'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt)); 

    $allowed = array('jpg', 'jpeg', 'png');

    


    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: ../index.php");
                $query_post = "INSERT INTO posts(userID, title, category, description, image) VALUES ('$userID', '$title', '$category', '$description', '$fileNameNew');";
                $return = $dbh->exec($query_post);
            } else {
                echo "Your file is to big!";
            }
        } else {
            echo "Det blev ett error vid uppladdningen av filen";
        }
    } else {
    echo "Du kan inte ladda upp filer av denna typ";
    }
} 


//

/* 

if (!$return) {
    
    print_r($dbh->errorInfo());
} else {
    header("location:../index.php?page=home");
}

 */

?>