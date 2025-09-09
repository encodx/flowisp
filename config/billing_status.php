<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$billing_statuses = [
    ['id' => 1, 'name' => 'Paid'],
    ['id' => 2, 'name' => 'Unpaid'],
    ['id' => 3, 'name' => 'Overdue'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Billing Status</h4>
            <a href="#" class="btn btn-primary">Add New Status</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($billing_statuses as $status): ?>
                            <tr>
                                <td><?php echo $status['id']; ?></td>
                                <td><?php echo $status['name']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
