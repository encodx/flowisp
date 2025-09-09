<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$tickets = [
    ['id' => 1, 'subject' => 'Internet not working', 'department' => 'Support', 'status' => 'Open', 'last_updated' => '2024-07-22 10:00 AM'],
    ['id' => 2, 'subject' => 'Slow speed', 'department' => 'Support', 'status' => 'In Progress', 'last_updated' => '2024-07-22 11:30 AM'],
    ['id' => 3, 'subject' => 'Billing issue', 'department' => 'Billing', 'status' => 'Closed', 'last_updated' => '2024-07-21 05:00 PM'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>Support & Ticketing</h2>

    <div class="support-menu">
        <a href="/support/tickets.php" class="sub-menu-btn">All Tickets</a>
        <a href="/support/new_ticket.php" class="sub-menu-btn">Create New Ticket</a>
    </div>

    <h3>Ticket List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Department</th>
                <th>Status</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= $ticket['id'] ?></td>
                <td><?= $ticket['subject'] ?></td>
                <td><?= $ticket['department'] ?></td>
                <td><?= $ticket['status'] ?></td>
                <td><?= $ticket['last_updated'] ?></td>
                <td>
                    <a href="#" class="action-btn view-btn">View</a>
                    <a href="#" class="action-btn edit-btn">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
