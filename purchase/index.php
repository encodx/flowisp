<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$purchases = [
    ['id' => 1, 'item' => 'Router', 'quantity' => 10, 'price' => '25000 BDT', 'vendor' => 'Vendor A', 'date' => '2024-07-20'],
    ['id' => 2, 'item' => 'Switch', 'quantity' => 5, 'price' => '15000 BDT', 'vendor' => 'Vendor B', 'date' => '2024-07-21'],
    ['id' => 3, 'item' => 'Cable', 'quantity' => 500, 'price' => '10000 BDT', 'vendor' => 'Vendor C', 'date' => '2024-07-22'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Purchase Management</h2>

    <div class="purchase-menu">
        <a href="/purchase/new.php" class="sub-menu-btn">New Purchase</a>
        <a href="/purchase/vendors.php" class="sub-menu-btn">Vendors</a>
        <a href="/purchase/reports.php" class="sub-menu-btn">Purchase Reports</a>
    </div>

    <h3>Recent Purchases</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Vendor</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchases as $purchase): ?>
            <tr>
                <td><?= $purchase['id'] ?></td>
                <td><?= $purchase['item'] ?></td>
                <td><?= $purchase['quantity'] ?></td>
                <td><?= $purchase['price'] ?></td>
                <td><?= $purchase['vendor'] ?></td>
                <td><?= $purchase['date'] ?></td>
                <td><a href="#" class="action-btn">Details</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
