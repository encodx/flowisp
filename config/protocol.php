<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$protocols = [
    ['id' => 1, 'name' => 'PPPoE'],
    ['id' => 2, 'name' => 'Static IP'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Protocols</h4>
            <a href="#" class="btn btn-primary">Add New Protocol</a>
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
                        <?php foreach ($protocols as $protocol): ?>
                            <tr>
                                <td><?php echo $protocol['id']; ?></td>
                                <td><?php echo $protocol['name']; ?></td>
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
