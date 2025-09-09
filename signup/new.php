<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

// Dummy data for dropdowns
$zones = [['id' => 1, 'name' => 'Zone A'], ['id' => 2, 'name' => 'Zone B']];
$sub_zones = [['id' => 1, 'name' => 'Sub Zone A1'], ['id' => 2, 'name' => 'Sub Zone B1']];
$connection_types = [['id' => 1, 'name' => 'Shared'], ['id' => 2, 'name' => 'Dedicated']];
$packages = [['id' => 1, 'name' => 'Home 10M'], ['id' => 2, 'name' => 'Office 20M']];
$protocols = [['id' => 1, 'name' => 'PPPoE'], ['id' => 2, 'name' => 'Static IP']];
$occupations = [['id' => 1, 'name' => 'Student'], ['id' => 2, 'name' => 'Service Holder']];

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<style>
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; grid-gap: 1.5rem; }
    .form-group { display: flex; flex-direction: column; }
    .form-group label { margin-bottom: 0.5rem; color: #333; font-weight: bold; }
    .form-group input, .form-group select, .form-group textarea { 
        padding: 0.75rem; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        font-size: 1rem;
    }
    .form-actions { grid-column: 1 / -1; text-align: right; }
    .submit-btn { background-color: #007bff; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer; }
</style>

<div class="main-content">
    <h2>New SignUp</h2>

    <form action="#" method="post">
        <div class="form-grid">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="father_name">Father's Name</label>
                <input type="text" id="father_name" name="father_name">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="nid">NID Number</label>
                <input type="text" id="nid" name="nid">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <select id="occupation" name="occupation">
                    <?php foreach ($occupations as $occupation): ?>
                        <option value="<?= $occupation['id'] ?>"><?= $occupation['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="form-group" style="grid-column: 1 / -1;">
                <label for="address">Present Address</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>
             <div class="form-group" style="grid-column: 1 / -1;">
                <label for="p_address">Permanent Address</label>
                <textarea id="p_address" name="p_address" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="zone">Zone</label>
                <select id="zone" name="zone">
                     <?php foreach ($zones as $zone): ?>
                        <option value="<?= $zone['id'] ?>"><?= $zone['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sub_zone">Sub Zone</label>
                <select id="sub_zone" name="sub_zone">
                    <?php foreach ($sub_zones as $sub_zone): ?>
                        <option value="<?= $sub_zone['id'] ?>"><?= $sub_zone['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="package">Package</label>
                <select id="package" name="package">
                   <?php foreach ($packages as $package): ?>
                        <option value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="connection_type">Connection Type</label>
                <select id="connection_type" name="connection_type">
                    <?php foreach ($connection_types as $type): ?>
                        <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="protocol">Protocol</label>
                <select id="protocol" name="protocol">
                    <?php foreach ($protocols as $protocol): ?>
                        <option value="<?= $protocol['id'] ?>"><?= $protocol['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="form-group">
                <label for="monthly_bill">Monthly Bill</label>
                <input type="number" id="monthly_bill" name="monthly_bill">
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Submit SignUp</button>
        </div>
    </form>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
