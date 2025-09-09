<?php
$host = 'localhost'; // Usually 'localhost', but can vary depending on your hosting provider
$dbname = 'easynet1_test2';
$username = 'easynet1_test';
$password = 'Inside@2462';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    // In a production environment, you should log this error, not display it.
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>