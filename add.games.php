<?php
require "./connectDB.php";
require "./function.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
            ':game_name'      => $_POST['game_name'],
            ':release_date'   => $_POST['release_date'],
            ':genre_name'     => $_POST['genre_name'],
            ':developer_name' => $_POST['developer_name'],
            ':publisher_name' => $_POST['publisher_name']
    ];

    $result = AddGames($pdo, $data);

    if ($result) {
        header('Location: ./index.php');
        exit;
    } else {
        echo 'Ошибка при добавлении игры...';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавление игры</title>
</head>
<body>
<!-- Навигация (шапка) -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid justify-content-center">
        <div class="text-center">
            <a class="navbar-brand d-inline-block" href="index.php">
                Games Archive
            </a>
            <p class="small text-muted mb-0">Хранилище информации о играх</p>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="ContactInfo.php">Контактная информация</a></li>
<!--                <li class="nav-item"><a class="nav-link" href="add.games.php">Добавить игру</a></li>-->

            </ul>
        </div>
    </div>
</nav>

<!-- Форма добавления -->
<div class="col-md-6 container mt-4 w-50 p-3 border border-dark" style="background-color: #eee;">
    <form method="post">
        <h2 class="text-center">Добавление новой игры</h2>
        <legend>Основная информация</legend>
        <div class="mb-3">
            <label for="game_name" class="form-label">Название игры:*</label>
            <input type="text" name="game_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Дата релиза:*</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genre_name" class="form-label">Жанр:*</label>
            <input type="text" name="genre_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="developer_name" class="form-label">Разработчик:</label>
            <input type="text" name="developer_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="publisher_name" class="form-label">Издатель:</label>
            <input type="text" name="publisher_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
        <button type="reset" class="btn btn-secondary">Сбросить</button>
        <a href="index.php" class="btn btn-primary">На главную</a>
    </form>
</div>
</body>
</html>