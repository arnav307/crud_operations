<?php
$server = "localhost";
$database = "student_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    // Enable exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Successfully connected to database";
} catch (PDOException $e) {
    die("Unable to connect database: " . $e->getMessage());
}
?>
