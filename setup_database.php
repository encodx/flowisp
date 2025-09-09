<?php
require_once 'database.php';

echo "<pre>";

try {
    // Table for Mikrotik Servers
    $sql_mikrotik = "CREATE TABLE IF NOT EXISTS mikrotik_servers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        ip_address VARCHAR(45) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL, -- In a real app, you must encrypt this!
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_mikrotik);
    echo "`mikrotik_servers` table created or already exists.\n";

    // Table for OLT Devices
    $sql_olt = "CREATE TABLE IF NOT EXISTS olts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        model VARCHAR(100),
        ip_address VARCHAR(45) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL, -- In a real app, you must encrypt this!
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_olt);
    echo "`olts` table created or already exists.\n";

    // Table for Attendance Devices
    $sql_devices = "CREATE TABLE IF NOT EXISTS attendance_devices (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        ip_address VARCHAR(45) NOT NULL,
        port INT DEFAULT 4370,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_devices);
    echo "`attendance_devices` table created or already exists.\n";

    // Table for Users
    $sql_users = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_users);
    echo "`users` table created or already exists.\n";

    // Insert a default user if not exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $stmt->execute(['username' => 'admin']);
    if ($stmt->rowCount() == 0) {
        $default_user = 'admin';
        // For a real application, NEVER store plain text passwords. Use password_hash().
        // $hashed_password = password_hash('password', PASSWORD_DEFAULT);
        $default_password = 'password'; // Storing plain text for simplicity as requested.
        
        $insert_sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $insert_stmt = $pdo->prepare($insert_sql);
        $insert_stmt->execute([
            ':username' => $default_user,
            ':password' => $default_password
        ]);
        echo "Default user 'admin' with password 'password' created.\n";
    } else {
        echo "Default user 'admin' already exists.\n";
    }

    echo "\nDatabase setup completed successfully!";

} catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}

echo "</pre>";
?>