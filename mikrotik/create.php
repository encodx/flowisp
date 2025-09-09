<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

/**
 * Simulates testing a connection to a MikroTik router.
 * 
 * !!! IMPORTANT !!!
 * This is a placeholder function. For a real implementation, you need to use a MikroTik API library 
 * like 'pearl/routeros-api'. You should install it via Composer:
 * `composer require pearl/routeros-api`
 * 
 * Then, you would replace the logic below with actual API connection code.
 *
 * require '../vendor/autoload.php';
 * use Pearl\RouterOS\Client;
 * use Pearl\RouterOS\Query;
 *
 * try {
 *     $client = new Client($ip, $user, $pass);
 *     // Connection is successful if no exception is thrown
 *     return true; 
 * } catch (\Exception $e) {
 *     // Log error: $e->getMessage();
 *     return false;
 * }
 */
function testMikroTikConnection($ip, $user, $pass) {
    // Placeholder: In a real scenario, this would attempt a real connection.
    // For this demo, we'll just check if the fields are not empty.
    return !empty($ip) && !empty($user) && !empty($pass);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed Server';
    $ip_address = $_POST['ip_address'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // "Test" the connection
    if (testMikroTikConnection($ip_address, $username, $password)) {
        // Initialize server list if it doesn't exist
        if (!isset($_SESSION['servers'])) {
            $_SESSION['servers'] = [];
        }

        // Create new server array
        $new_server = [
            'id' => count($_SESSION['servers']) + 1,
            'name' => $name,
            'ip' => $ip_address,
            // We won't store the username and password in the session for this example
            // but you would store them securely in a database.
            'status' => 'Connected' // Assume connected since our test passed
        ];

        // Add to the list of servers
        $_SESSION['servers'][] = $new_server;
        
        // Set a success message
        $_SESSION['message'] = "Server '{$name}' added successfully!";

    } else {
        // Set an error message
        $_SESSION['error'] = "Failed to connect to MikroTik server '{$name}'. Please check credentials and network.";
    }
    
    // Redirect back to the server list
    header('Location: index.php');
    exit;

} else {
    // If not a POST request, redirect to the form
    header('Location: new.php');
    exit;
}