<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #FAF7E5 0%, #91B7D1 100%);
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            height: 100%;
            font-family: 'Inter', sans-serif !important;
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
            width: calc(100% - 250px); /* Adjust the width to take up the remaining space */
        }
        .topbar {
            background-color: #89a8bd;
            padding: 15px;
            color: white;
            font-weight: bold;
            font-size: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-box {
            background-color: #89a8bd;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 18px;
            border-radius: 8px;
        }
        .chart-container {
            width: 40%;
            margin: auto;
        }
        .clock, .date {
            font-size: 18px;
            color: white;
            margin: 0;
        }
        .clock {
            font-size: 24px;
            font-weight: bold;
        }
        .top-right-corner {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            text-align: right;
            justify-content: center;
        }
        .top-right-corner div {
            margin-bottom: 5px;
        }
    </style>

    <script>
        // Clock function to update the time every second
        function updateClock() {
            const clockElement = document.getElementById('clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.innerHTML = `${hours}:${minutes}:${seconds}`;
            
            // Display current date
            const dateElement = document.getElementById('date');
            const date = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            dateElement.innerHTML = date;
        }

        setInterval(updateClock, 1000); // Update clock every second
    </script>
</head>
<body onload="updateClock()">
    <div class="sidebar">
        <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="Logo">
        <h2>Admin</h2>

        <a href="http://localhost:8080/adminSide/dashboard#" class="active"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a>
        <a href="/admin/announcements"><i class="fas fa-bullhorn"></i> CREATE ANNOUNCEMENT</a>
        <a href="/admin/users"><i class="fas fa-users"></i> MANAGE USERS</a>
        <a href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
    </div>

    <div class="content">
        <div class="topbar">
            <div>Dashboard</div>
            <!-- Clock and Date placed on the right -->
            <div class="top-right-corner">
                <div class="clock" id="clock"></div>
                <div class="date" id="date"></div>
            </div>
        </div>

        <div class="container mt-4">
            <h2 class="text-left mb-4" style="font-weight: 600; color: #3b3b3b;">Welcome Admin!</h2>
        </div>

        <div class="row mt-4">
            <!-- Total Users Card -->
            <div class="col-md-5 offset-md-1">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="card-title text-dark">Total Users</h5>
                        <p class="card-text fs-4 text-muted"><?= $totalUsers ?? 0; ?></p>
                    </div>
                </div>
            </div>

            <!-- Announcements Card -->
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-bullhorn fa-3x text-warning mb-3"></i>
                        <h5 class="card-title text-dark">Announcements</h5>
                        <p class="card-text fs-4 text-muted"><?= $totalAnnouncements ?? 0; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphs Below the Cards -->
        <div class="row mt-4">
            <!-- Total Users Bar Chart -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center text-dark">Total Users</h5>
                        <canvas id="totalUsersChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Total Announcements Bar Chart -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-center text-dark">Total Announcements</h5>
                        <canvas id="totalAnnouncementsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Fetch data from PHP (for example purposes, replace with actual data)
        var totalUsers = <?= $totalUsers ?? 0; ?>;
        var totalAnnouncements = <?= $totalAnnouncements ?? 0; ?>;

        // Total Users Bar Chart
        var ctx1 = document.getElementById('totalUsersChart').getContext('2d');
        var totalUsersChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Total Users'],
                datasets: [{
                    label: 'Total Users',
                    data: [totalUsers],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Total Announcements Bar Chart
        var ctx2 = document.getElementById('totalAnnouncementsChart').getContext('2d');
        var totalAnnouncementsChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Total Announcements'],
                datasets: [{
                    label: 'Total Announcements',
                    data: [totalAnnouncements],
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
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
