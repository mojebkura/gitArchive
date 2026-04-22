<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=gamesproject', 'root', '');
}catch(PDOException $error){
    die('Error: ' . $error->getMessage());
}
