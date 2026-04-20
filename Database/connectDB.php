<?php
$host = 'localhost';
$db = 'gamesproject';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;";
$options =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try{
    $pdo = new PDO($dsn, $username, $password, $options);
}catch (PDOException $error){
    die("Error: ". $error->getMessage());
}