<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

/**
 * Simulates testing a connection to a ZKTeco device.
 * 
 * !!! IMPORTANT !!!
 * This is a placeholder. For a real implementation, you need a specific ZKTeco library.
 * A popular one is 'racfpt/php-zkteco'. Install it via Composer:
 * `composer require racfpt/php-zkteco`
 * 
 * Then, you would use its methods to connect and interact with the device.
 * 
 * require '../vendor/autoload.php';
 * use Rats\Zkteco\Lib\ZKTeco;
 *
 * try {
 *     $zk = new ZKTeco($ip, $port);
 *     if ($zk->connect()) {
 *         // Connection successful
 *         $zk->disconnect();
 *         return true;
 *     } else {
 *         return false;
 *     }
 * } catch (\Exception $e) {
 *     // Log error: $e->getMessage();
 *     return false;
 * }
 */
function testZKTecoConnection($ip, $port) {
    // Placeholder: Check if the fields are not empty.
    return !empty($ip) && !empty($port);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed Device';
    $ip_address = $_POST['ip_address'] ?? '';
    $port = $_POST['port'] ?? 4370;

    if (testZKTecoConnection($ip_address, $port)) {
        if (!isset($_SESSION['devices'])) {
            $_SESSION['devices'] = [];
        }

        $new_device = [
            'id' => count($_SESSION['devices']) + 1,
            'name' => $name,
            'ip' => $ip_address,
            'port' => $port,
            'status' => 'Online'
        ];

        $_SESSION['devices'][] = $new_device;
        $_SESSION['message'] = "Device '{$name}' added successfully!";

    } else {
        $_SESSION['error'] = "Failed to connect to device '{$name}'. Please check IP and port.";
    }
    
    header('Location: devices.php');
    exit;

} else {
    header('Location: new_device.php');
    exit;
}