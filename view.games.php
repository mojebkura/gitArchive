<?php
require './connectDB.php';
require './function.php';
try {
    $sql = "SELECT * FROM games";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $games = $statement->fetchAll();
}catch(PDOException $error){
    die("Error: ". $error->getMessage());
}

?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/viewstyle.css">
    <title>Таблица</title>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid justify-content-center">
            <div class="text-center">
                <a class="navbar-brand d-inline-block" href="#">
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
<!--                    <li class="nav-item"><a class="nav-link" href="add.games.php">Добавить игру</a></li>-->
                    <li class="nav-item"><a class="nav-link" href="view.games.php">Просмотр игр</a></li>

                </ul>
            </div>
        </div>
    </nav>
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Краткая информация о играх на сайте</h2>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-bordered table-hover align-middle">
            <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Название игры</th>
                <th>Дата релиза</th>
                <th>Жанр</th>
                <th>Разработчик</th>
                <th>Издатель</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($games) > 0): ?>
                <?php foreach ($games as $game): ?>
                    <tr>
                        <td><?= htmlspecialchars($game['id']) ?></td>
                        <td><?= htmlspecialchars($game['game_name']) ?></td>
                        <td><?= htmlspecialchars($game['release_date']) ?></td>
                        <td><?= htmlspecialchars($game['genre_name']) ?></td>
                        <td><?= htmlspecialchars($game['developer_name'] ) ?></td>
                        <td><?= htmlspecialchars($game['publisher_name'] ) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Нет добавленных игр</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>