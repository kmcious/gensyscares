<?php
    $session = session();
    if (!$session->get('logged_in')) {
        header('Location: ' . base_url('auth/login'));
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #fef8ef;
            overflow-x: hidden;
        }
        .sidebar {
            background-color: #89a8bd;
            width: 250px;
            height: 100vh;
            position: fixed;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar img {
            width: 80px;
            margin-bottom: 10px;
        }
        .sidebar h2 {
            color: white;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 10px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .topbar {
            background-color: #89a8bd;
            padding: 15px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="Logo">
        <h2>Admin</h2>

        <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
        <a href="/admin/announcements"><i class="fas fa-bullhorn"></i> ANNOUNCEMENT CREATE</a>
         <a href="/admin/users"><i class="fas fa-users"></i> MANAGE USERS</a>
        <a href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="content">
        <div class="topbar">Dashboard</div>
        <h2>Welcome Admin!</h2>
    </div>
</body>
</html>

