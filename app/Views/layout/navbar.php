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

        <!-- Profile Icon -->
<div class="user-icon">
    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
        <img src="<?= base_url('images/logo/profile.png'); ?>" alt="User Login">
    </a>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            
            <div class="modal-body d-flex p-0">
                <!-- Left Side: Login Form -->
                <div class="login-form">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="Logo" class="logo">
                    </div>
                    <form action="<?= base_url('auth/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-style" placeholder="Type here your email..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control input-style" placeholder="Type here your password..." required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <input type="checkbox" id="rememberMe">
                                <label for="rememberMe">Remember Me</label>
                            </div>
                            <a href="#" class="forgot-link">Forgot Password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn login-btn">Login</button>
                        </div>
                        <p class="text-center mt-3"><a href="#">Terms of Service</a></p>
                    </form>
                </div>

                <!-- Right Side: Social Login -->
                <div class="social-login">
                    <p class="text-light text-center mb-3">or Login with</p>
                    <button class="btn social-btn google"><img src="<?= base_url('images/icons/google.png'); ?>" alt=""> Google</button>
                    <button class="btn social-btn facebook"><img src="<?= base_url('images/icons/facebook.png'); ?>" alt=""> Facebook</button>
                    <button class="btn social-btn microsoft"><img src="<?= base_url('images/icons/microsoft.png'); ?>" alt=""> Microsoft</button>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
