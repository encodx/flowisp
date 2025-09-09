<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$bills = [
    ['id' => 1, 'client_name' => 'Client A', 'amount' => 1000, 'status' => 'Paid', 'due_date' => '2024-08-10'],
    ['id' => 2, 'client_name' => 'Client B', 'amount' => 1200, 'status' => 'Unpaid', 'due_date' => '2024-08-12'],
    ['id' => 3, 'client_name' => 'Client C', 'amount' => 1500, 'status' => 'Paid', 'due_date' => '2024-08-15'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Billing Management</h2>

    <div class="billing-actions">
        <a href="/billing/generate.php" class="add-btn">Generate Bills</a>
        <a href="/billing/payments.php" class="add-btn">View Payments</a>
    </div>

    <h3>Recent Bills</h3>
    <table>
        <thead>
            <tr>
                <th>Bill ID</th>
                <th>Client Name</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bills as $bill): ?>
            <tr>
                <td><?= $bill['id'] ?></td>
                <td><?= $bill['client_name'] ?></td>
                <td><?= $bill['amount'] ?></td>
                <td><?= $bill['due_date'] ?></td>
                <td><?= $bill['status'] ?></td>
                <td>
                    <a href="#" class="action-btn edit-btn">View Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
