<?php

$serverName = 'localhost';
$userName = 'root';
$dbName = 'php-api';
$password = '';

try {

    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    $id = $_GET['id'];


    $query = 'UPDATE users SET first_name = ?, last_name = ?, age = ? WHERE id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$data->first_name, $data->last_name, $data->age, $id]);


    $result = 'دادا موردنظر شما با موفقیت ویرایش شد';
    echo $result;
} catch (Exception $e) {
    echo 'connection ' . $e->getMessage();
}
