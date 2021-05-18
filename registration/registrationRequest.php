<?php

include '../Request.php';
include '../Validator.php';

$request = new Request();
$validator = new Validator();

$name = $validator->validate($request->getRequest('name'));
$email = $validator->validate($request->getRequest('email'));
$password = md5($validator->validate($request->getRequest('password')));//функция md5 для хэширования пароля (для безопасности)

$connection = new mysqli('localhost', 'root', '', 'new_users');
$result = $connection->query("INSERT INTO `users_table` (name, email, password) VALUES ('$name', '$email', '$password')");

if ($result) {
    echo json_encode(array('result' => 'success'));
} else {
    echo json_encode(array('result' => 'failed'));
}

$connection->close();