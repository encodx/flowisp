<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

// Static data for demonstration
$stats = [
    ['title' => 'Total Client', 'value' => '1,250', 'icon' => 'fa-users', 'color' => 'bg-blue'],
    ['title' => 'Running Clients', 'value' => '1,100', 'icon' => 'fa-person-running', 'color' => 'bg-green'],
    ['title' => 'Inactive Clients', 'value' => '150', 'icon' => 'fa-wifi', 'color' => 'bg-yellow'],
    ['title' => 'Free Clients', 'value' => '25', 'icon' => 'fa-user-plus', 'color' => 'bg-cyan'],
    ['title' => 'New Clients', 'value' => '50', 'icon' => 'fa-user-plus', 'color' => 'bg-purple'],
    ['title' => 'Renewed Clients', 'value' => '350', 'icon' => 'fa-sync', 'color' => 'bg-pink'],
    ['title' => 'Deactivated Clients', 'value' => '10', 'icon' => 'fa-user-gear', 'color' => 'bg-orange'],
    ['title' => 'Left Clients', 'value' => '5', 'icon' => 'fa-user-minus', 'color' => 'bg-red'],
    ['title' => 'Total Billing Clients', 'value' => '1,225', 'icon' => 'fa-file-invoice', 'color' => 'bg-teal'],
    ['title' => 'Paid Clients', 'value' => '1,050', 'icon' => 'fa-money-bill-wave', 'color' => 'bg-lime'],
    ['title' => 'Total Unpaid Clients', 'value' => '175', 'icon' => 'fa-exclamation-triangle', 'color' => 'bg-dark-red'],
    ['title' => 'Rejected Clients', 'value' => '2', 'icon' => 'fa-user-xmark', 'color' => 'bg-red'],
    ['title' => 'Billing Expired Clients', 'value' => '30', 'icon' => 'fa-calendar-times', 'color' => 'bg-indigo'],
    ['title' => 'Unpaid Extension', 'value' => '15', 'icon' => 'fa-calendar-plus', 'color' => 'bg-orange'],
];

include 'layout/header.php';
include 'layout/sidebar.php';
?>
<!-- Main Header -->
<header class="header">
    <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input type="text" placeholder="Search clients, tickets...">
    </div>
    <div class="header-right">
        <a href="#" class="header-btn"><i class="fa-solid fa-wifi"></i> Online Monitor</a>
        <a href="#" class="header-btn"><i class="fa-solid fa-ticket"></i> Open Ticket</a>
        <a href="#" class="header-btn support"><i class="fa-solid fa-headset"></i> Support</a>
        <i class="fa-regular fa-bell"></i>
        <div class="user-profile">
            <img src="https://via.placeholder.com/40" alt="User">
        </div>
    </div>
</header>

<!-- Main dashboard content -->
<div class="stats-grid">
    <?php foreach ($stats as $stat): ?>
    <div class="stat-card <?= $stat['color'] ?>">
        <h3><?= $stat['title'] ?></h3>
        <p><?= $stat['value'] ?></p>
        <i class="fa-solid <?= $stat['icon'] ?> stat-icon"></i>
    </div>
    <?php endforeach; ?>
</div>

<div class="charts-section">
    <div class="chart-container">
        <!-- Chart will be here -->
        <h3>Monthly New Clients</h3>
        <p>A chart showing the trend of new client acquisitions over the past months.</p>
        <!-- Placeholder for chart -->
        <canvas id="monthlyClientsChart"></canvas>
    </div>
    <div class="unpaid-clients">
        <!-- Unpaid clients list will be here -->
        <h3>Top 5 Unpaid Clients</h3>
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
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
