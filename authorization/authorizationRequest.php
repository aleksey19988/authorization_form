<?php
include '../Request.php';
include '../Cookies.php';

$request = new Request();
$cookies = new Cookies();

$email = $request->getRequest('email');
$password = md5($request->getRequest('password'));

$connection = new mysqli('localhost', 'root', '', 'new_users');
$result = $connection->query("SELECT * FROM users_table WHERE email = '$email' AND password = '$password'");
$user = $result->fetch_assoc();

if (!empty($user)) {
    $cookies->setCookie('userId', $user['id']);
    $cookies->setCookie('userName', $user['name']);
    $cookies->setCookie('userEmail', $user['email']);
    echo json_encode(array(
        'result' => 'success',
        'name' => "{$user['name']}",
    ));
} else {
    echo json_encode(array(
        'result' => 'failed',
        'error' => 'Такой пользователь не найден. Попробуй ещё раз',
    ));
}

$connection->close();