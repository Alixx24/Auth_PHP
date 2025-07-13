<?php

$users = [
    "user1" => [
        "name" => "Alice",
        "age" => 30,
        "email" => "alice@example.com"
    ],
    "user2" => [
        "name" => "Bob",
        "age" => 25,
        "email" => "bob@example.com"
    ],
    "user3" => [
        "name" => "Charlie",
        "age" => 28,
        "email" => "charlie@example.com"
    ],
    "user4" => [
        "name" => "Diana",
        "age" => 35,
        "email" => "diana@example.com"
    ]
];

// Example: Access Diana's email


echo json_encode($users);