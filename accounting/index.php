<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$accounts = [
    ['id' => 1, 'account' => 'Cash', 'balance' => '500000 BDT'],
    ['id' => 2, 'account' => 'Bank', 'balance' => '1200000 BDT'],
    ['id' => 3, 'account' => 'Accounts Receivable', 'balance' => '300000 BDT'],
    ['id' => 4, 'account' => 'Accounts Payable', 'balance' => '150000 BDT'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Accounting Dashboard</h2>

    <div class="accounting-menu">
        <a href="/accounting/new_transaction.php" class="sub-menu-btn">New Transaction</a>
        <a href="/accounting/chart_of_accounts.php" class="sub-menu-btn">Chart of Accounts</a>
        <a href="/accounting/reports.php" class="sub-menu-btn">Financial Reports</a>
    </div>

    <h3>Account Balances</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Account</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
            <tr>
                <td><?= $account['id'] ?></td>
                <td><?= $account['account'] ?></td>
                <td><?= $account['balance'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
