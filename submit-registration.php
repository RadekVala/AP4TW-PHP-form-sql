<?php 

 // Bezpečně získat hodnoty z $_POST, předpokládáme, že všechny klíče mohou být nepřítomné
 $username = isset($_POST['username']) ? $_POST['username'] : '';
 $email = isset($_POST['email']) ? $_POST['email'] : '';
 $password = isset($_POST['password']) ? $_POST['password'] : '';
 $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

 // Základní validace formuláře
 if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
     echo "Všechna pole jsou povinná.";
 } else if ($password !== $confirmPassword) {
     echo "Hesla se neshodují.";
 } else {

// Nastavit spojení s SQLite databází
$db = new PDO('sqlite:./database.sqlite');
    // Hashování hesla pro bezpečné uložení
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// SQL příkaz pro vložení dat
$sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :passwordHash)";

// Příprava a provedení SQL příkazu
$stmt = $db->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':passwordHash', $passwordHash, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "Registrace byla úspěšná.";
} catch (PDOException $e) {
    // V případě chyby vložení zaznamenat chybu (může být způsobena např. duplicity uživatelského jména nebo emailu)
    echo "Nastala chyba při registraci: " . $e->getMessage();
}
     // Zde byste měli přidat kód pro uložení nového uživatele do databáze
     // Nezapomeňte na hashování hesla před jeho uložením
     echo "Registrace úspěšná. Uživatelské jméno: $username, E-mail: $email";
     // Po uložení můžete přesměrovat na jinou stránku nebo zobrazit zprávu o úspěchu
 }

?>