<?php

/*
// Nastavit spojení s SQLite databází
$db = new PDO('sqlite:./database.sqlite');

// SQL příkaz pro vybrání všech uživatelů
$sql = "SELECT username, email FROM users ORDER BY created_at DESC";

// Příprava a provedení SQL příkazu
$stmt = $db->query($sql);

// Kontrola, zda byly nalezeny nějaké záznamy
if ($stmt === false) {
    echo "Nepodařilo se načíst uživatele.";
} else {
    // Projít výsledky a vypsat je
    echo "<h2>Seznam registrovaných uživatelů</h2>";
    echo "<ul>";
    foreach ($stmt as $row) {
        echo "<li>" . htmlspecialchars($row['username']) . " (" . htmlspecialchars($row['email']) . ")</li>";
    }
    echo "</ul>";
}

*/

class User {
    public $id;
    public $username;
    public $email;
    public $passwordHash;
    public $createdAt;
    public $updatedAt;

    public function __construct($id, $username, $email, $passwordHash, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Zde můžete přidat další metody, jako jsou gettery a settery nebo metody pro obchodní logiku
}

// Nastavit spojení s SQLite databází
$db = new PDO('sqlite:./database.sqlite');

// Assuming $db is your PDO database connection
$sql = "SELECT * FROM users";
$stmt = $db->query($sql);

// Setting the fetch mode to PDO::FETCH_CLASS
$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

$users = [];
while ($user = $stmt->fetch()) {
    $users[] = $user;
}


// Projít výsledky a vypsat je
echo "<h2>Seznam registrovaných uživatelů</h2>";
echo "<ul>";
foreach ($users as $user) {
    echo "<li>" . htmlspecialchars($user->username) . " (" . htmlspecialchars($user->email) . ")</li>";
}
echo "</ul>";

?>