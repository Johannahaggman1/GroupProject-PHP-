<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="signUp.php">
    <button type="submit">Sign up!</button>
    </form>

    <?php
        print($_POST['submit']);
    ?>
</body>
</html>