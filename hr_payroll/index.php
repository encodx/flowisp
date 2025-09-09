<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy Data
$employees = [
    ['id' => 1, 'name' => 'John Doe', 'department' => 'IT', 'designation' => 'Manager', 'salary' => 60000],
    ['id' => 2, 'name' => 'Jane Smith', 'department' => 'HR', 'designation' => 'Executive', 'salary' => 40000],
    ['id' => 3, 'name' => 'Peter Jones', 'department' => 'Accounts', 'designation' => 'Accountant', 'salary' => 45000],
];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<div class="main-content">
    <h2>HR & Payroll</h2>

    <div class="hr-menu">
        <a href="/hr_payroll/employees.php" class="sub-menu-btn">Employees</a>
        <a href="/hr_payroll/payroll.php" class="sub-menu-btn">Payroll</a>
        <a href="/hr_payroll/attendance.php" class="sub-menu-btn">Attendance</a>
    </div>

    <h3>Employee List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['department'] ?></td>
                <td><?= $employee['designation'] ?></td>
                <td><?= $employee['salary'] ?></td>
                <td>
                    <a href="#" class="action-btn edit-btn">Edit</a>
                    <a href="#" class="action-btn delete-btn">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
