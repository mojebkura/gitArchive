<?php
function selectGames($pdo) {
    $sql = "SELECT 
                id AS 'ID',
                game_name AS 'Название игры',
                release_date AS 'Дата релиза',
                genre_name AS 'Жанр',
                developer_name AS 'Разработчик',
                publisher_name AS 'Издатель'
            FROM games
            ORDER BY games DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function AddGames($pdo,$data) {
    $data = [
        ':game_name' => $_POST['game_name'],
        ':release_date' => $_POST['release_date'],
        ':genre_name' => $_POST['genre_name'],
        ':developer_name' => $_POST['developer_name'],
        ':publisher_name' => $_POST['publisher_name']
    ];
    $sql = "INSERT INTO `games` 
            (`game_name`, `release_date`, `genre_name`, `developer_name`, `publisher_name`) 
            VALUES 
            (:game_name, :release_date, :genre_name, :developer_name, :publisher_name)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}
function getGameById($pdo, $id) {
    $sql = "SELECT * FROM games WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function EditGame($pdo, $data) {
    $sql = "UPDATE `games` SET 
                `game_name` = :game_name,
                `release_date` = :release_date,
                `genre_name` = :genre_name,
                `developer_name` = :developer_name,
                `publisher_name` = :publisher_name
            WHERE `id` = :id";
    $statement = $pdo->prepare($sql);
    return $statement->execute($data);
}
?>