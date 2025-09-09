<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$providers = [
    ['id' => 1, 'name' => 'Provider A', 'bandwidth' => '10 Gbps', 'cost' => '50000 BDT'],
    ['id' => 2, 'name' => 'Provider B', 'bandwidth' => '5 Gbps', 'cost' => '28000 BDT'],
];

$resellers = [
    ['id' => 1, 'name' => 'Reseller X', 'bandwidth' => '500 Mbps', 'price' => '10000 BDT'],
    ['id' => 2, 'name' => 'Reseller Y', 'bandwidth' => '1 Gbps', 'price' => '18000 BDT'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Bandwidth Buy-Sell Management</h2>

    <div class="bandwidth-menu">
        <a href="/bandwidth/providers.php" class="sub-menu-btn">Providers</a>
        <a href="/bandwidth/resellers.php" class="sub-menu-btn">Resellers</a>
        <a href="/bandwidth/reports.php" class="sub-menu-btn">Reports</a>
    </div>

    <h3>Bandwidth Providers (Buy)</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bandwidth</th>
                <th>Monthly Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providers as $provider): ?>
            <tr>
                <td><?= $provider['id'] ?></td>
                <td><?= $provider['name'] ?></td>
                <td><?= $provider['bandwidth'] ?></td>
                <td><?= $provider['cost'] ?></td>
                <td><a href="#" class="action-btn">Manage</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Bandwidth Resellers (Sell)</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bandwidth</th>
                <th>Monthly Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resellers as $reseller): ?>
            <tr>
                <td><?= $reseller['id'] ?></td>
                <td><?= $reseller['name'] ?></td>
                <td><?= $reseller['bandwidth'] ?></td>
                <td><?= $reseller['price'] ?></td>
                <td><a href="#" class="action-btn">Manage</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
