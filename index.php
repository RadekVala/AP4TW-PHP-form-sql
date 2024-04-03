<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrační formulář</title>
</head>
<body>

<h2>Registrační formulář</h2>

<form action="/submit-registration.php" method="post">
    <label for="username">Uživatelské jméno:</label><br>
    <input type="text" id="username" name="username" required><br>
    
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Heslo:</label><br>
    <input type="password" id="password" name="password" required><br>
    
    <label for="confirm-password">Potvrzení hesla:</label><br>
    <input type="password" id="confirm-password" name="confirm_password" required><br><br>
    
    <input type="submit" value="Registrovat">
</form> 

</body>
</html>
