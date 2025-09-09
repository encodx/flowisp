<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

/**
 * Simulates testing a connection to an OLT device.
 * 
 * !!! IMPORTANT !!!
 * This is a placeholder function. OLT devices are often managed via SNMP, Telnet, or a proprietary web API.
 * For a real implementation, you would use PHP's SNMP functions or an HTTP client like Guzzle.
 * Example with Guzzle for a REST API:
 *
 * require '../vendor/autoload.php';
 * use GuzzleHttp\Client;
 * try {
 *     $client = new Client(['base_uri' => 'http://'.$ip]);
 *     $response = $client->request('POST', '/api/login', ['json' => ['user' => $user, 'pass' => $pass]]);
 *     return $response->getStatusCode() === 200;
 * } catch (\Exception $e) {
 *     // Log error: $e->getMessage();
 *     return false;
 * }
 */
function testOLTConnection($ip, $user, $pass) {
    // Placeholder: Check if the fields are not empty.
    return !empty($ip) && !empty($user) && !empty($pass);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unnamed OLT';
    $model = $_POST['model'] ?? 'Generic Model';
    $ip_address = $_POST['ip_address'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (testOLTConnection($ip_address, $username, $password)) {
        if (!isset($_SESSION['olts'])) {
            $_SESSION['olts'] = [];
        }

        $new_olt = [
            'id' => count($_SESSION['olts']) + 1,
            'name' => $name,
            'model' => $model,
            'ip' => $ip_address,
            'status' => 'Online' // Assume online since our test passed
        ];

        $_SESSION['olts'][] = $new_olt;
        $_SESSION['message'] = "OLT '{$name}' added successfully!";

    } else {
        $_SESSION['error'] = "Failed to connect to OLT '{$name}'. Please check details and network.";
    }
    
    header('Location: index.php');
    exit;

} else {
    header('Location: new.php');
    exit;
}