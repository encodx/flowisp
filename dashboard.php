<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

// Static data for demonstration
$stats = [
    ['title' => 'Total Client', 'value' => '1,250', 'icon' => 'fa-users', 'color' => 'text-blue'],
    ['title' => 'Running Clients', 'value' => '1,100', 'icon' => 'fa-person-running', 'color' => 'text-green'],
    ['title' => 'Inactive Clients', 'value' => '150', 'icon' => 'fa-wifi', 'color' => 'text-yellow'],
    ['title' => 'Free Clients', 'value' => '25', 'icon' => 'fa-user-plus', 'color' => 'text-cyan'],
    ['title' => 'New Clients', 'value' => '50', 'icon' => 'fa-user-plus', 'color' => 'text-purple'],
    ['title' => 'Renewed Clients', 'value' => '350', 'icon' => 'fa-sync', 'color' => 'text-pink'],
    ['title' => 'Deactivated Clients', 'value' => '10', 'icon' => 'fa-user-gear', 'color' => 'text-orange'],
    ['title' => 'Left Clients', 'value' => '5', 'icon' => 'fa-user-minus', 'color' => 'text-red'],
];

include 'layout/header.php';
include 'layout/sidebar.php';
?>
<!-- Main Header -->
<header class="header">
    <div class="header-left">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="header-right">
        <i class="fa-regular fa-bell"></i>
        <i class="fa-regular fa-envelope"></i>
        <div class="user-profile">
            <img src="https://via.placeholder.com/40" alt="User">
        </div>
    </div>
</header>

<div class="stats-grid">
    <?php foreach ($stats as $stat): ?>
    <div class="stat-card">
        <div class="stat-icon <?= $stat['color'] ?>">
            <i class="fa-solid <?= $stat['icon'] ?>"></i>
        </div>
        <div class="stat-card-info">
            <h3><?= $stat['title'] ?></h3>
            <p><?= $stat['value'] ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="charts-section">
    <div class="chart-container card">
        <div class="card-header">
             <h4>Monthly New Clients</h4>
        </div>
        <div class="card-body">
            <canvas id="monthlyClientsChart"></canvas>
        </div>
    </div>
    <div class="unpaid-clients card">
        <div class="card-header">
            <h4>Top 5 Unpaid Clients</h4>
        </div>
        <div class="card-body">
            <!-- Unpaid clients list will be here -->
        </div>
    </div>
</div>

</main> <!--- closes main-content -->
</div> <!--- closes wrapper -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Basic Chart.js implementation
const ctx = document.getElementById('monthlyClientsChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'New Clients',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: true,
            borderColor: '#435ebe',
            backgroundColor: 'rgba(67, 94, 238, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>

</body>
</html>
