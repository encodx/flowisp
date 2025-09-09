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

    // Table for Zones
    $sql_zones = "CREATE TABLE IF NOT EXISTS zones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_zones);
    echo "`zones` table created or already exists.\n";

    // Table for Sub Zones
    $sql_sub_zones = "CREATE TABLE IF NOT EXISTS sub_zones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        zone_id INT,
        FOREIGN KEY (zone_id) REFERENCES zones(id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_sub_zones);
    echo "`sub_zones` table created or already exists.\n";

    // Table for Connection Types
    $sql_connection_types = "CREATE TABLE IF NOT EXISTS connection_types (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_connection_types);
    echo "`connection_types` table created or already exists.\n";

    // Table for Protocols
    $sql_protocols = "CREATE TABLE IF NOT EXISTS protocols (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_protocols);
    echo "`protocols` table created or already exists.\n";

    // Table for Packages
    $sql_packages = "CREATE TABLE IF NOT EXISTS packages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        speed VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_packages);
    echo "`packages` table created or already exists.\n";

    // Table for Billing Status
    $sql_billing_status = "CREATE TABLE IF NOT EXISTS billing_status (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_billing_status);
    echo "`billing_status` table created or already exists.\n";

    // Table for Districts
    $sql_districts = "CREATE TABLE IF NOT EXISTS districts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_districts);
    echo "`districts` table created or already exists.\n";

    // Table for Upazilas
    $sql_upazilas = "CREATE TABLE IF NOT EXISTS upazilas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        district_id INT,
        FOREIGN KEY (district_id) REFERENCES districts(id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql_upazilas);
    echo "`upazilas` table created or already exists.\n";

    echo "\nDatabase setup completed successfully!";

} catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}

echo "</pre>";
?>