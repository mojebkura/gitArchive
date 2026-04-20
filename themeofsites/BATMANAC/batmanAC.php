<?php
require 'Database/connectDB.php';
require 'index.php';
require 'SelectGames.php';

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM games WHERE id = 1");
$stmt->execute([$id]);
$game = $stmt->fetch();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batman Arkham Knight</title>
</head>
<body>
<h1>gfg</h1>
</body>
</html>