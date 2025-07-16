<?php

$serverName = 'localHost';
$dbName = 'php-api';
$userName = 'root';
$password = '';

try {

    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

} catch (PDOException $e) {

    echo 'error: ' . $e->getMessage();
    return false;
}
