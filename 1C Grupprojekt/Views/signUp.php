<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

    <center>
    <h1>Registrera</h1>
    
    <form method="POST" action="Includes/signup_functions.php">
        Användarnamn:<br>
        <input type="text" name="username" placeholder="Skapa användarnamn..." required>
        <br>Lösenord:<br>
        <input type="password" name="password" placeholder="Skapa Lösenord..." required>
        <br>Mailadress:<br>
        <input type="text" name="email" placeholder="Skriv din mail..." required>
        <br>
        <button type="submit" name="submit">Skapa</button>
    </form>
    </center>

    
</body>
</html>