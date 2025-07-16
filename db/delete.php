<?php

$serverName = 'localhost';
$userName = 'root';
$dbName = 'php-api';
$password = '';

try {






        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);

        // $json = file_get_contents('php://input');
        // $data = json_decode($json);

        // $id = $data->id;
        
        $id = $_POST['id'];
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $result = 'رکورد موردنظر شما با موفقیت حذف شد';
        echo $result;
} catch (Exception $e) {
    echo 'connection ' . $e->getMessage();
}
