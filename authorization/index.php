<?php
include '../Cookies.php';

$cookies = new Cookies();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="../style/authorizationStyle.css" rel="stylesheet">
    <title>Войти</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="sign-in-container">
                <button class="btn btn-primary register-btn" type="button">
                    <a href="../registration/index.html" class="register-link">Зарегистрироваться</a>
                </button>
            </div>
        </div>
    </nav>
    <?php if (empty($cookies->getCookie('userName'))): ?>
    <div class="container-lg">
        <div class="form-container" id="form-container">
            <form method="post" id="sign-in-form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email адрес</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div class="container-lg">
        <div class="welcome-container">
            <h3 class="welcome-header">Здорово! &#127881;</h3>
            <p class="welcome-content">Привет, <?= $cookies->getCookie('userName')?>! Если хочешь выйти, жми <a href="./exit.php">здесь</a>.</p>
        </div>
    </div>
    <?php endif; ?>
</body>
<script src="authorizationFetch.js"></script>
</html>