<?php
session_start();

// If already logged in, redirect to the dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: dashboard.php');
    exit;
}

$login_error = $_SESSION['login_error'] ?? null;
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FiberFlow Connect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="main-logo">
            <i class="fa-solid fa-network-wired"></i>
        </div>

        <h1 class="app-title">FiberFlow Connect</h1>
        <p class="app-subtitle">Internet Service Provider Management System</p>

        <div class="login-box">
            <h2>Log in to your account.</h2>

            <?php if ($login_error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($login_error) ?></div>
            <?php endif; ?>

            <form action="auth.php" method="post">
                <div class="form-group">
                    <label for="username">User ID</label>
                    <input type="text" name="username" id="username" placeholder="Enter your user ID." required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" placeholder="Enter your password." required>
                        <i class="fa-regular fa-eye-slash toggle-password" onclick="togglePassword()"></i>
                    </div>
                </div>

                <button type="submit" class="login-btn">
                    <i class="fa-solid fa-circle-notch fa-spin" style="display: none;"></i>
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login
                </button>
            </form>

            <a href="#" class="register-link">New customer registration</a>
        </div>

        <div class="footer-icons">
            <div class="icon-item">
                <i class="fa-solid fa-server"></i>
                <span>Mikrotik API</span>
            </div>
            <div class="icon-item">
                <i class="fa-solid fa-sitemap"></i>
                <span>OLT Integration</span>
            </div>
            <div class="icon-item">
                <i class="fa-solid fa-fingerprint"></i>
                <span>Biometric</span>
            </div>
        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const icon = document.querySelector('.toggle-password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }

    // Optional: Show a spinner on login button click
    document.querySelector('.login-btn').addEventListener('click', function() {
        this.querySelector('.fa-spin').style.display = 'inline-block';
        this.querySelector('.fa-right-to-bracket').style.display = 'none';
    });
    </script>

</body>
</html>
