<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$packages = [
    ['id' => 1, 'name' => 'Basic', 'speed' => '5 Mbps', 'price' => '500'],
    ['id' => 2, 'name' => 'Standard', 'speed' => '10 Mbps', 'price' => '800'],
    ['id' => 3, 'name' => 'Premium', 'speed' => '20 Mbps', 'price' => '1200'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Packages</h4>
            <a href="#" class="btn btn-primary">Add New Package</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Speed</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($packages as $package): ?>
                            <tr>
                                <td><?php echo $package['id']; ?></td>
                                <td><?php echo $package['name']; ?></td>
                                <td><?php echo $package['speed']; ?></td>
                                <td><?php echo $package['price']; ?></td>
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
