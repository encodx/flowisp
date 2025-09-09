<?php
session_start();

// If the user is not logged in, redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

// Dummy data for the dashboard
$data = [
    'total_clients' => 1250,
    'running_clients' => 980,
    'inactive_clients' => 150,
    'free_clients' => 20,
    'new_clients' => 55,
    'renewed_clients' => 210,
    'deactivated_clients' => 45,
    'left_clients' => 30,
    'total_billing_clients' => 1230,
    'paid_clients' => 1100,
    'total_unpaid_clients' => 130,
    'rejected_clients' => 15,
    'billing_expired_clients' => 75,
    'unpaid_extension_clients' => 10,
    'pending_tickets' => 25,
    'processing_tickets' => 12,
    'complete_tickets' => 150,
    'daily_attendance' => 45,
    'absent' => 5,
    'leave_weekend' => 10,
    'paid_salary' => '5,50,000 BDT',
    'monthly_problem_occurrence' => [/* Graph data here */],
    'most_problems_solved' => 'Network Team',
    'monthly_new_clients' => 120,
    'top_20_unpaid_clients' => [ /* Array of clients */ ],
    'total_monthly_bill' => '12,30,000 BDT',
    'collected_bill' => '11,00,000 BDT',
    'total_due' => '1,30,000 BDT',
    'sms_balance' => 5000,
    'purchases_paid_amount' => '2,50,000 BDT',
    'cash_on_hand' => '75,000 BDT'
];

include 'layout/header.php';
include 'layout/sidebar.php';

?>

        <div class="main-content">
            <h1>Dashboard</h1>

            <h2>Client Related</h2>
            <div class="widgets">
                <div class="widget"><h4>Total Clients</h4><div class="value"><?= $data['total_clients'] ?></div></div>
                <div class="widget"><h4>Running Clients</h4><div class="value"><?= $data['running_clients'] ?></div></div>
                <div class="widget"><h4>Inactive Clients</h4><div class="value"><?= $data['inactive_clients'] ?></div></div>
                 <div class="widget"><h4>Paid Clients</h4><div class="value"><?= $data['paid_clients'] ?></div></div>
                <div class="widget"><h4>Total Unpaid Clients</h4><div class="value"><?= $data['total_unpaid_clients'] ?></div></div>
            </div>

            <h2>Support & Ticket</h2>
             <div class="widgets">
                <div class="widget"><h4>Pending Tickets</h4><div class="value"><?= $data['pending_tickets'] ?></div></div>
                <div class="widget"><h4>Processing Tickets</h4><div class="value"><?= $data['processing_tickets'] ?></div></div>
                <div class="widget"><h4>Complete Tickets</h4><div class="value"><?= $data['complete_tickets'] ?></div></div>
            </div>

            <h2>Billing & Finance</h2>
            <div class="widgets">
                <div class="widget"><h4>Total Monthly Bill</h4><div class="value"><?= $data['total_monthly_bill'] ?></div></div>
                <div class="widget"><h4>Collected Bill</h4><div class="value"><?= $data['collected_bill'] ?></div></div>
                <div class="widget"><h4>Total Due</h4><div class="value"><?= $data['total_due'] ?></div></div>
                <div class="widget"><h4>Cash On Hand</h4><div class="value"><?= $data['cash_on_hand'] ?></div></div>
            </div>

        </div>
    </div>

</body>
</html>
