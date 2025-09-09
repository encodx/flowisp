<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Simulation function
function testOLTConnection($ip, $user, $pass) {
    return !empty($ip) && !empty($user) && !empty($pass);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed OLT';
    $model = $_POST['model'] ?? '';
    $ip_address = $_POST['ip_address'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (testOLTConnection($ip_address, $username, $password)) {
        try {
            $sql = "INSERT INTO olts (name, model, ip_address, username, password) VALUES (:name, :model, :ip, :user, :pass)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':model' => $model,
                ':ip'   => $ip_address,
                ':user' => $username,
                ':pass' => $password // Storing plain password - NOT recommended!
            ]);
            $_SESSION['message'] = "OLT '{$name}' added successfully!";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: Could not add OLT. " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Failed to connect to OLT '{$name}'. Please check details.";
    }
    
    header('Location: index.php');
    exit;

} else {
    header('Location: new.php');
    exit;
}