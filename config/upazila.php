<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$upazilas = [
    ['id' => 1, 'name' => 'Mirpur', 'district' => 'Dhaka'],
    ['id' => 2, 'name' => 'Pahartali', 'district' => 'Chittagong'],
    ['id' => 3, 'name' => 'Daulatpur', 'district' => 'Khulna'],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <div class="card-header">
            <h4>Upazilas</h4>
            <a href="#" class="btn btn-primary">Add New Upazila</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($upazilas as $upazila): ?>
                            <tr>
                                <td><?php echo $upazila['id']; ?></td>
                                <td><?php echo $upazila['name']; ?></td>
                                <td><?php echo $upazila['district']; ?></td>
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
