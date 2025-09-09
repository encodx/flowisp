<aside class="sidebar">
    <div class="sidebar-header">
        <h3>FiberFlow</h3>
    </div>
    <ul class="sidebar-menu">
        <li class="active"><a href="../dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a></li>
        
        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-cogs"></i> Configuration <i class="fa-solid fa-chevron-right arrow"></i></a>
            <ul class="submenu">
                <li><a href="#">Company Profile</a></li>
                <li><a href="#">User Role</a></li>
                <li><a href="#">User Access</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa-solid fa-list"></i> Sign Up List</a></li>

        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-users"></i> Client Menu <i class="fa-solid fa-chevron-right arrow"></i></a>
             <ul class="submenu">
                <li><a href="#">Add New Client</a></li>
                <li><a href="#">All Clients</a></li>
                <li><a href="#">Active Clients</a></li>
            </ul>
        </li>

        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i> Billing Menu <i class="fa-solid fa-chevron-right arrow"></i></a>
             <ul class="submenu">
                <li><a href="#">Generate Bill</a></li>
                <li><a href="#">All Invoices</a></li>
                <li><a href="#">Paid Invoices</a></li>
            </ul>
        </li>

        <li><a href="../mikrotik/index.php"><i class="fa-solid fa-server"></i> Mikrotik Server</a></li>
        
        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-sitemap"></i> OLT Management <i class="fa-solid fa-chevron-right arrow"></i></a>
            <ul class="submenu">
                <li><a href="../olt/index.php">OLT Devices</a></li>
                <li><a href="#">ONUs</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa-solid fa-network-wired"></i> Network Diagram</a></li>

        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-users-cog"></i> HR & Payroll <i class="fa-solid fa-chevron-right arrow"></i></a>
            <ul class="submenu">
                <li><a href="../hr_payroll/devices.php">Attendance Device</a></li>
                <li><a href="#">Employee List</a></li>
                <li><a href="#">Salary</a></li>
            </ul>
        </li>

        <li><a href="#"><i class="fa-solid fa-life-ring"></i> Support & Ticketing</a></li>
        <li><a href="#"><i class="fa-solid fa-chart-line"></i> Bandwidth Buy-Sell</a></li>
        <li><a href="#"><i class="fa-solid fa-shopping-cart"></i> Purchase Menu</a></li>
        <li><a href="#"><i class="fa-solid fa-calculator"></i> Accounting Menu</a></li>
        <li><a href="#"><i class="fa-solid fa-chart-bar"></i> Report Menu</a></li>
        <li><a href="#"><i class="fa-solid fa-sms"></i> SMS Service</a></li>

        <li class="has-submenu">
            <a href="#"><i class="fa-solid fa-bars"></i> System Menu <i class="fa-solid fa-chevron-right arrow"></i></a>
            <ul class="submenu">
                <li><a href="#">System Settings</a></li>
                <li><a href="#">Release Note</a></li>
            </ul>
        </li>

        <li><a href="../logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.sidebar-menu .has-submenu > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const parent = this.parentElement;
            
            // Close other open submenus
            const openSubmenus = document.querySelectorAll('.has-submenu.open');
            openSubmenus.forEach(openSubmenu => {
                if(openSubmenu !== parent) {
                    openSubmenu.classList.remove('open');
                    openSubmenu.querySelector('.submenu').style.display = 'none';
                }
            });

            // Toggle current submenu
            parent.classList.toggle('open');
            const submenu = this.nextElementSibling;
            if (parent.classList.contains('open')) {
                submenu.style.display = 'block';
            } else {
                submenu.style.display = 'none';
            }
        });
    });
});
</script>
