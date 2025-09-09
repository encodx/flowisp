<?php
session_start();

// If a login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    // Hardcoded credentials for demonstration
    define('USER_ID', 'admin');
    define('PASSWORD', 'password');

    $user_id = $_POST['user_id'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($user_id === USER_ID && $password === PASSWORD) {
        // Correct credentials, start a new session
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id;

        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Incorrect credentials, redirect back to login
        header('Location: login.php?error=invalid_credentials');
        exit;
    }
}

// If the user is already logged in, redirect them to the dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

// If not logged in, redirect to the login page.
header('Location: login.php');
exit;
