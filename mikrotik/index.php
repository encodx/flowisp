<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Include the necessary files
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
include __DIR__ . '/../includes/MikrotikAPI.php';

// Dummy data for MikroTik servers
// In a real application, this would come from a database
$servers = [
    [
        'name' => 'Main Router',
        'ip' => '103.149.23.130',
        'username' => 'support',
        'password' => 'suPPort@246%^*',
    ],
    [
        'name' => 'Secondary Router',
        'ip' => '192.168.88.2', // An example of an offline/unreachable router
        'username' => 'admin',
        'password' => 'password',
    ],
     [
        'name' => 'Test Router',
        'ip' => '103.149.23.130', // Wrong credentials example
        'username' => 'wronguser',
        'password' => 'wrongpass',
    ],
];

?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark">MikroTik Servers</h3>
        <button class="btn btn-primary">+ Add New Server</button>
    </div>

    <div class="row">
        <?php foreach ($servers as $server): ?>
            <?php
                // Establish connection
                $api = new MikrotikAPI($server['ip'], $server['username'], $server['password']);
                $resources = null;
                if ($api->isConnected()) {
                    $resources = $api->getResources();
                }
            ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm mikrotik-card status-<?= ($api->isConnected() ? 'online' : 'offline') ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <h5 class="card-title mb-1"><?= htmlspecialchars($server['name']) ?></h5>
                            <span class="badge status-badge">
                                <?= ($api->isConnected() ? 'Online' : 'Offline') ?>
                            </span>
                        </div>
                        <p class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($server['ip']) ?></p>
                        <hr>
                        
                        <?php if ($api->isConnected() && $resources): ?>
                            <div class="row server-info">
                                <div class="col-6">
                                    <small class="text-muted">Uptime</small>
                                    <p><?= htmlspecialchars($resources['uptime']) ?></p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">CPU Load</small>
                                    <p><?= htmlspecialchars($resources['cpu-load']) ?>%</p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Board Name</small>
                                    <p><?= htmlspecialchars($resources['board-name']) ?></p>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Version</small>
                                    <p><?= htmlspecialchars($resources['version']) ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="text-center text-muted pt-4">
                                <i class="fa-solid fa-circle-xmark fa-2x mb-2"></i>
                                <p>Could not connect to the router. Please check IP and credentials.</p>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="card-footer bg-light">
                         <a href="#" class="btn btn-sm btn-outline-primary">Details</a>
                         <a href="#" class="btn btn-sm btn-outline-secondary">Configure</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>
