<?php
require 'Database/connectDB.php';

$id = $_POST["id"];
$game_name = $_POST['game_name'];
$release_date = $_POST['release_date'];
$developer_name= $_POST['developer_name'];
$publisher_name= $_POST['publisher_name'];
$game_genre = $_POST['genre_name'];

try{
    $sql = 'INSERT INTO games (game_name,release_date,genre_name,developer_name,publisher_name) VALUES (:name, :date, :genre, :developer, :publisher)';
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':game_name'=> $game_name,
        ':release_date'=> $release_date,
        ':genre_name'=> $game_genre,
        ':developer_name'=> $developer_name,
        ':publisher_name'=> $publisher_name
    ]);
}catch(PDOException $error){
    die('Error: '. $error->getMessage());
}

header('Location: ./index.php');