<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Announcements</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/css/admincss/adminAnnouncementStyle.css') ?>">
</head>

<body>

    <section class="section1">
        <h2>Announcements</h2>
        <button class="btn btn-primary" id="btnModal" data-bs-toggle="modal" data-bs-target="#announcementModal" onclick="openModal()">
            <img src="<?= base_url('images/adminAnnouncement/square-plus.png') ?>" /> Add New Announcement
        </button>

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php endif; ?>
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif; ?>

        <div class="container-fluid" id="tableContainer">
            <table class="table table-bordered mt-3">
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
                            <td><?= esc($announcement['title']) ?></td>
                            <td><?= esc($announcement['event_date']) ?></td>
                            <td><?= esc($announcement['location']) ?></td>
                            <td><img src="<?= base_url($announcement['image_path']) ?>" width="100" height="100" class="img-thumbnail"></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#announcementModal"
                                    onclick="openModal(<?= $announcement['id'] ?>, '<?= esc($announcement['title']) ?>', '<?= esc($announcement['event_date']) ?>', '<?= esc($announcement['location']) ?>', '<?= esc($announcement['image_path']) ?>')">
                                    Edit
                                </button>
                                <a href="<?= site_url('admin/announcements/delete/' . $announcement['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Add/Edit Announcement Modal -->
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
                        <input type="hidden" id="announcement_id" name="id"> <!-- Hidden ID for editing -->

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
                            <input type="hidden" id="existing_image" name="existing_image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Announcement</button>
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
            document.getElementById('existing_image').value = image_path;

            if (id) {
                document.getElementById('announcementModalLabel').innerText = "Edit Announcement";
            } else {
                document.getElementById('announcementModalLabel').innerText = "Add New Announcement";
            }
        }
    </script>

</body>
</html>
