<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=vanilla;charset=utf8mb4", "vanilla", "LP/_39ffPX]/x)Ff", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
} catch (PDOException $e) {
    var_dump($e->getMessage());
    exit;
}
