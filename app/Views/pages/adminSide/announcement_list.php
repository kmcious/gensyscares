<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Announcements</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/admincss/adminAnnouncementStyle.css') ?>">
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

    <section class="content">
        <div class="topbar">Admin Announcements</div>
        <button class="btn btn-primary" id="btnModal" data-bs-toggle="modal" data-bs-target="#announcementModal" onclick="openModal()">
            <i class="fas fa-plus-circle"></i> Add Announcement
        </button>

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success mt-3"> <?= session('success') ?> </div>
        <?php endif; ?>
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger mt-3"> <?= session('error') ?> </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Event Date</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($announcements as $announcement): ?>
                        <tr>
                            <td class="fw-semibold"> <?= esc($announcement['title']) ?> </td>
                            <td> <?= esc($announcement['event_date']) ?> </td>
                            <td> <?= esc($announcement['location']) ?> </td>
                            <td>
                                <img src="<?= base_url($announcement['image_path']) ?>" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" 
                                    data-bs-target="#announcementModal"
                                    onclick="openModal(<?= $announcement['id'] ?>, '<?= esc($announcement['title']) ?>', '<?= esc($announcement['event_date']) ?>', '<?= esc($announcement['location']) ?>', '<?= esc($announcement['image_path']) ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= site_url('admin/announcements/delete/' . $announcement['id']) ?>" 
                                    class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="announcementModalLabel">Add New Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/announcements/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" id="announcement_id" name="id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <textarea class="form-control" id="location" name="location" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id = '', title = '', event_date = '', location = '', image_path = '') {
            document.getElementById('announcement_id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('event_date').value = event_date;
            document.getElementById('location').value = location;
        }
    </script>

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
</body>
</html>