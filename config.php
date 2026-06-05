<?php

$host = 'localhost';
$dbname = 'guestbook_db';
$user = 'root';
$pass = 'root';


$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $options);

} catch(PDOException $e) {
    die('Ошибка подключения: ' . $e->getMessage());
}