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
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Welcome, User</h2>
        <p>You are logged in as <strong><?= $session->get('email'); ?></strong>.</p>
        
        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
    </div>

</body>
</html>