<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/admincss/adminManageUserStyle.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #fef8ef;
            overflow-x: hidden;
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
            font-family: 'Poppins', sans-serif !important;
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
            padding: 30px;
            width: calc(100% - 250px);
        }

        /* Topbar */
        .topbar {
            background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
            padding: 15px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Table */
        table {
            width: 100%;
            margin-top: 20px;
        }

        .table thead {
            background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
            color: white;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background: linear-gradient(to bottom, #91B7D1 100%, #FAF7E5 0%);
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .modal-body input, .modal-body select {
            border-radius: 8px;
            box-shadow: none;
            margin-bottom: 10px;
        }

        .modal-footer .btn {
            border-radius: 50px;
        }

        /* Toast Notification */
        .toast {
            z-index: 9999;
            background-color: #007bff;
            color: white;
        }

        .toast-header {
            background-color: #0056b3;
            color: white;
        }

        .toast-body {
            color: white;
        }
    </style>
</head>

<body>

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
            <h2>User Management</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userModal">Add User</button>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                            <form action="<?= site_url('admin_user/updateRole'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="<?= site_url('admin_user/deleteUser/' . $user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('admin_user/addUser'); ?>" method="post">
                        <!-- CSRF Token -->
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="mb-3">
                            <label for="userName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="userName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPassword" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" name="role" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php if (session()->has('message')): ?>
                    <?= session()->get('message'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Show the toast only if there's a message in the session
            var toastMessage = "<?php echo session()->get('message'); ?>";
            if (toastMessage) {
                var toastElement = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        };
    </script>

</body>

</html>