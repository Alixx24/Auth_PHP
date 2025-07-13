<?php

$serverName = 'localhost';
$userName = 'root';
$dbName = 'php-api';
$password = '';

try {
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
$pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);

$query = "SELECT * FROM users";
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();
$json = json_encode($users);
echo $json;
die;

} catch (Exception $e) {
    echo 'connection ' . $e->getMessage();
}
