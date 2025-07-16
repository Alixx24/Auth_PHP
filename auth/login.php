<?php

require_once 'db_connection.php';
header('Content-Type: text/html; charset=utf-8');


$json = file_get_contents('php://input');
$data = json_decode($json);


if (isset($data->username) && $data->username !== '' && isset($data->password) && $data->password !== '') {

    $userName = $data->username;
    $password = $data->password;



    $loginQuery = "SELECT * FROM `users_api` WHERE `username` = ?";
    $stmt = $pdo->prepare($loginQuery);
    $result = $stmt->execute([$userName]);

    $user = $stmt->fetch();

    if ($user !== false) {
        if (password_verify($password, $user['password'])) {
            $response['status'] = true;
            $response['message'] = 'ورود موفقیت امیز بود';
            $response['data'] = $user;
        } else {
            $response['status'] = false;
            $response['message'] = 'نام کاربری یا رمز عبور اشتباهه';
        }
    } else {
        $response['status'] = false;
        $response['message'] = 'کاربر یافت نشد';
    }
} else {
    $response['status'] = false;
    $response['message'] = 'رمز عبور و پسورد احباری میباشد';
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
