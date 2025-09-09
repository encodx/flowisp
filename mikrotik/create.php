<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// The testMikroTikConnection function remains a simulation
function testMikroTikConnection($ip, $user, $pass) {
    return !empty($ip) && !empty($user) && !empty($pass);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed Server';
    $ip_address = $_POST['ip_address'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (testMikroTikConnection($ip_address, $username, $password)) {
        try {
            $sql = "INSERT INTO mikrotik_servers (name, ip_address, username, password) VALUES (:name, :ip, :user, :pass)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':ip'   => $ip_address,
                ':user' => $username,
                ':pass' => $password // Storing plain password - NOT recommended for production
            ]);
            $_SESSION['message'] = "Server '{$name}' added successfully!";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: Could not add server. " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Failed to connect to MikroTik Server '{$name}'. Please check details.";
    }
    
    header('Location: index.php');
    exit;

} else {
    header('Location: new.php');
    exit;
}