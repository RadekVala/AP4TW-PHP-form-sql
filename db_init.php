<?php
// Nastavit spojení s SQLite databází
$db = new PDO('sqlite:./database.sqlite');

// SQL příkaz pro vytvoření tabulky
$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT DEFAULT CURRENT_TIMESTAMP
);
";

// Spuštění SQL příkazu
$db->exec($sql);

echo "Tabulka 'users' byla úspěšně vytvořena nebo již existuje.";
?>