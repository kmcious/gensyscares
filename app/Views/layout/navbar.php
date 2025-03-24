<!-- Navbar -->
<!-- Bootstrap CSS -->
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/homestyle.css'); ?>">
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        
        <!-- Left: Logo -->
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="GENSYS CARES" class="logo">
        </a>

        <!-- Center: Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="<?= site_url('/') ?>">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('announcement') ?>">ANNOUNCEMENT</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('about') ?>">ABOUT US</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('contact') ?>">CONTACT</a></li>
    </ul>
</div>


        <!-- Right: Profile Icon -->
        <div class="user-icon">
            <a href="<?= base_url('profile'); ?>"> 
                <img src="<?= base_url('images/logo/profile.png'); ?>" alt="User Profile">
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
