<?php
require 'Database/connectDB.php';
require 'index.php';

function SelectGames($pdo, $data) {
    $sql = "INSERT INTO games (game_name,release_date,genre_name,developer_name,publisher_name) VALUES (:name, :date, :genre, :developer, :publisher)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
            ':game_name'=> $_POST['game_name'],
            ':release_date'=> $_POST ['release_date'],
            ':genre_name'=> $_POST ['game_genre'],
            ':developer_name'=> $_POST ['developer_name'],
            ':publisher_name'=>$_POST ['publisher_name']
    ];

    $result = SelectGames($pdo, $data);

    if ($result) {
        header('Location: ./index.php');
        exit;
    } else {
        echo 'Ошибка при выборе игры';
    }
}
