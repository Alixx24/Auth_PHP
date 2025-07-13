<?php

$serverName = 'localhost';
$userName = 'root';
$dbName = 'php-api';
$password = '';

try{


     
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);

        $json = file_get_contents('php://input');
        $data = json_decode($json);

        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $age = $data->age;
        $query = "INSERT INTO  `users` (`first_name`, `last_name`, `age`) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$first_name, $last_name, $age]);
        $result = 'رکورد موردنظر شما با موفقیت ساخته شد';
        echo $result;
}
catch(Exception $e)
{

}