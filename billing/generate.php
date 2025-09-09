<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit;
}

include '../layout/header.php';
include '../layout/sidebar.php';
?>

<style>
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; grid-gap: 1.5rem; }
    .form-group { display: flex; flex-direction: column; }
    .form-group label { margin-bottom: 0.5rem; font-weight: bold; }
    .form-group select { padding: 0.75rem; border: 1px solid #ccc; border-radius: 4px; }
    .form-actions { grid-column: 1 / -1; text-align: right; margin-top: 1rem; }
    .submit-btn { background-color: #28a745; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; cursor: pointer; }
</style>

<div class="main-content">
    <h2>Generate Monthly Bills</h2>

    <form action="#" method="post">
        <div class="form-grid">
            <div class="form-group">
                <label for="month">Select Month</label>
                <select id="month" name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
             <div class="form-group">
                <label for="year">Select Year</label>
                <select id="year" name="year">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Generate Bills for All Clients</button>
        </div>
    </form>
</div>

</div><!-- closes the container div from header -->
</body>
</html>
