<?php
session_start();
require_once 'database.php'; // Use the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // For simplicity, we are comparing plain text passwords.
        // In a real application, you MUST use password_verify() with a hashed password.
        // if ($user && password_verify($password, $user['password'])) {
        if ($user && $password === $user['password']) {
            // Password is correct, start a new session
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            
            header('Location: dashboard.php');
            exit;
        } else {
            // Incorrect username or password
            $_SESSION['login_error'] = "Invalid username or password.";
            header('Location: index.php');
            exit;
        }
    } catch (PDOException $e) {
        // In a real app, log this error.
        $_SESSION['login_error'] = "A database error occurred. Please try again later.";
        header('Location: index.php');
        exit;
    }
} else {
    // Not a POST request
    header('Location: index.php');
    exit;
}
?>