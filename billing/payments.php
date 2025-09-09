<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$payments = [
    ['id' => 1, 'client_name' => 'Client A', 'amount' => 1000, 'date' => '2024-07-25', 'method' => 'Cash'],
    ['id' => 2, 'client_name' => 'Client C', 'amount' => 1500, 'date' => '2024-07-28', 'method' => 'bKash'],
    ['id' => 3, 'client_name' => 'Client D', 'amount' => 800, 'date' => '2024-07-29', 'method' => 'Bank'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Payment History</h2>

     <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Client Name</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= $payment['id'] ?></td>
                <td><?= $payment['client_name'] ?></td>
                <td><?= $payment['amount'] ?></td>
                <td><?= $payment['date'] ?></td>
                <td><?= $payment['method'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
