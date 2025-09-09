<div class="sidebar">
    <h3>Main Menu</h3>
    <ul>
        <li><a href="/dashboard.php">Dashboard</a></li>
        <li class="has-submenu">
            <a href="#">Configuration</a>
            <ul class="submenu">
                <li><a href="/config/zone.php">Zone</a></li>
                <li><a href="/config/sub_zone.php">Sub Zone</a></li>
                <li><a href="/config/connection_type.php">Connection Type</a></li>
                <li><a href="/config/package.php">Package</a></li>
                <li><a href="/config/protocol.php">Protocol</a></li>
                <li><a href="/config/occupation.php">Occupation</a></li>
            </ul>
        </li>
        <li><a href="/signup/index.php">SignUp List</a></li>
        <li class="has-submenu">
            <a href="#">Client Menu</a>
            <ul class="submenu">
                <li><a href="/client/index.php">Client List</a></li>
                <li><a href="/client/new.php">Add New Client</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="#">Billing Menu</a>
            <ul class="submenu">
                <li><a href="/billing/index.php">Billing Dashboard</a></li>
                <li><a href="/billing/generate.php">Generate Bills</a></li>
                <li><a href="/billing/payments.php">View Payments</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="#">Mikrotik Server</a>
            <ul class="submenu">
                <li><a href="/mikrotik/index.php">Server List</a></li>
                <li><a href="/mikrotik/new.php">Add New Server</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="#">OLT Management</a>
            <ul class="submenu">
                <li><a href="/olt/index.php">OLT List</a></li>
                <li><a href="/olt/new.php">Add New OLT</a></li>
            </ul>
        </li>
        <li><a href="/network/index.php">Network Diagram</a></li>
        <li class="has-submenu">
            <a href="#">HR & Payroll</a>
            <ul class="submenu">
                <li><a href="/hr_payroll/employees.php">Employees</a></li>
                <li><a href="/hr_payroll/payroll.php">Payroll</a></li>
                <li><a href="/hr_payroll/attendance.php">Attendance</a></li>
                <li><a href="/hr_payroll/devices.php">Attendance Devices</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/support/index.php">Support & Ticketing</a>
            <ul class="submenu">
                <li><a href="/support/tickets.php">All Tickets</a></li>
                <li><a href="/support/new_ticket.php">Create New Ticket</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/bandwidth/index.php">Bandwidth Buy-Sell</a>
            <ul class="submenu">
                <li><a href="/bandwidth/providers.php">Providers</a></li>
                <li><a href="/bandwidth/resellers.php">Resellers</a></li>
                <li><a href="/bandwidth/reports.php">Reports</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/purchase/index.php">Purchase Menu</a>
            <ul class="submenu">
                <li><a href="/purchase/new.php">New Purchase</a></li>
                <li><a href="/purchase/vendors.php">Vendors</a></li>
                <li><a href="/purchase/reports.php">Purchase Reports</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/accounting/index.php">Accounting Menu</a>
            <ul class="submenu">
                <li><a href="/accounting/new_transaction.php">New Transaction</a></li>
                <li><a href="/accounting/chart_of_accounts.php">Chart of Accounts</a></li>
                <li><a href="/accounting/reports.php">Financial Reports</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/report/index.php">Report Menu</a>
            <ul class="submenu">
                <li><a href="/report/client_reports.php">Client Reports</a></li>
                <li><a href="/report/billing_reports.php">Billing Reports</a></li>
                <li><a href="/report/support_reports.php">Support Reports</a></li>
                <li><a href="/report/network_reports.php">Network Reports</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/sms/index.php">SMS Service</a>
            <ul class="submenu">
                <li><a href="/sms/send_single.php">Send Single SMS</a></li>
                <li><a href="/sms/send_bulk.php">Send Bulk SMS</a></li>
                <li><a href="/sms/reports.php">SMS Reports</a></li>
            </ul>
        </li>
        <li class="has-submenu">
            <a href="/system/index.php">System Menu</a>
            <ul class="submenu">
                <li><a href="/system/user_management.php">User Management</a></li>
                <li><a href="/system/settings.php">System Settings</a></li>
                <li><a href="/system/db_backup.php">Database Backup</a></li>
            </ul>
        </li>
        <li><a href="/releasenote/index.php">Release Note</a></li>
    </ul>
</div>
<script>
    document.querySelectorAll('.has-submenu > a').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            let submenu = item.nextElementSibling;

            // Hide all other submenus
            document.querySelectorAll('.submenu').forEach(otherSubmenu => {
                if (otherSubmenu !== submenu) {
                    otherSubmenu.style.display = 'none';
                }
            });

            // Toggle the clicked submenu
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
            } else {
                submenu.style.display = 'block';
            }
        });
    });
</script>
