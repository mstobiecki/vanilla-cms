<?php

$env = parse_ini_file(__DIR__ . '/../.env', false, INI_SCANNER_RAW);

if ($env === false) {
    exit('Brak pliku konfiguracyjnego .env.');
}

try {
    $pdo = new PDO("mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4", $env['DB_USER'], $env['DB_PASSWORD'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
} catch (PDOException $e) {
    var_dump($e->getMessage());
    exit;
}
