<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f6f9; }
        .header { background-color: #fff; padding: 1rem; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
        .header .search-bar { width: 300px; }
        .header input { padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        .header .top-nav a { margin-left: 1rem; text-decoration: none; color: #333; }
        .container { display: flex; }
        .sidebar { width: 250px; background-color: #343a40; color: white; padding: 1rem; }
        .sidebar h3 { color: #c2c7d0; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li a { color: #c2c7d0; text-decoration: none; display: block; padding: 0.75rem 1rem; border-radius: 4px; }
        .sidebar ul li a:hover { background-color: #494e53; color: #fff; }
        .sidebar .submenu { list-style: none; padding-left: 1rem; display: none; }
        .sidebar .submenu li a { padding: 0.5rem 1rem; }
        .main-content { flex-grow: 1; padding: 2rem; }
        .widgets { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); grid-gap: 1.5rem; }
        .widget { background-color: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .widget h4 { margin-top: 0; margin-bottom: 0.5rem; color: #6c757d; }
        .widget .value { font-size: 2rem; font-weight: bold; color: #333; }
        .logout { float: right; padding: 0.5rem 1rem; background-color: #dc3545; color: white; border-radius: 5px; text-decoration: none; }
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; }
        .action-btn { padding: 0.5rem 1rem; text-decoration: none; color: white; border-radius: 4px; margin-right: 0.5rem; font-size: 0.875rem;}
        .edit-btn { background-color: #ffc107; }
        .delete-btn { background-color: #dc3545; }
        .add-btn { background-color: #28a745; float: right; margin-bottom: 1rem; color:white; padding: 0.75rem 1.5rem; text-decoration:none; border-radius: 5px; }
    </style>
</head>
<body>

    <div class="header">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="top-nav">
            <a href="#">Open Support Ticket</a>
            <a href="#">Online Client Monitoring</a>
            <a href="#">Notifications</a>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>

    <div class="container">
