<?php
session_start();
require_once '../database.php'; // Include the database connection

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Simulation function
function testZKTecoConnection($ip, $port) {
    return !empty($ip) && !empty($port);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed Device';
    $ip_address = $_POST['ip_address'] ?? '';
    $port = $_POST['port'] ?? 4370;

    if (testZKTecoConnection($ip_address, $port)) {
        try {
            $sql = "INSERT INTO attendance_devices (name, ip_address, port) VALUES (:name, :ip, :port)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':ip'   => $ip_address,
                ':port' => $port
            ]);
            $_SESSION['message'] = "Device '{$name}' added successfully!";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: Could not add device. " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Failed to connect to device '{$name}'. Please check IP and port.";
    }
    
    header('Location: devices.php');
    exit;

} else {
    header('Location: new_device.php');
    exit;
}