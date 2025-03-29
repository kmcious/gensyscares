<!-- Navbar -->
<!-- Bootstrap CSS -->
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/homestyle.css'); ?>">
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        
        <!-- Left: Logo -->
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="GENSYS CARES" class="logo">
        </a>

        <!-- Center: Navbar Links -->
        <?php 
$request = service('request'); 
$segment = $request->getUri()->getSegment(1);
?>

<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= ($segment == '') ? 'active' : '' ?>" href="<?= site_url('/') ?>">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'announcement') ? 'active' : '' ?>" href="<?= site_url('announcement') ?>">ANNOUNCEMENT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'about') ? 'active' : '' ?>" href="<?= site_url('about') ?>">ABOUT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($segment == 'contact') ? 'active' : '' ?>" href="<?= site_url('contact') ?>">CONTACT</a>
        </li>
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
                    <div class="logo">
                        <img src="<?= base_url('images/logos/logo.png'); ?>" alt="Logo" class="logo">
                    </div>
                    <h2 class="text-center mb-4">Login</h2> <!-- Added Login Title -->
                    <form action="<?= base_url('auth/login'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-style" placeholder="Type here your email..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control input-style" placeholder="Type here your password..." required>
                        </div>
                        
                        <!-- Remember Me and Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="rememberMe" class="form-check-input">
                                <label for="rememberMe" class="form-check-label">Remember Me</label>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn login-btn">Login</button>
                        </div>
                        <p class="text-center mt-3">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a></p>
                        <p class="text-center mt-3"><a href="#">Terms of Service</a></p>
                    </form>
                </div>

                <!-- Right Side: Social Login -->
                <div class="social-login">
                    <p class="text-light text-center mb-3">or Login with</p>
                    <button class="btn social-btn google"><img src="<?= base_url('images/logo/google.png'); ?>" alt=""> Google</button>
                    <button class="btn social-btn facebook"><img src="<?= base_url('images/logo/fb.svg'); ?>" alt=""> Facebook</button>
                    <button class="btn social-btn microsoft"><img src="<?= base_url('images/logo/microsoft.png'); ?>" alt=""> Microsoft</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#loginModal form").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("<?= base_url('auth/login'); ?>", {
            method: "POST",
            headers: { "X-Requested-With": "XMLHttpRequest" },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                window.location.href = data.redirect;
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => console.error("Fetch Error:", error));
    });
});
</script>





<!--register modal-->
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center p-0">
                <div class="register-form p-4">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('images/logo/logo1.png'); ?>" alt="Logo" class="logo">
                    </div>
                    <form id="registerForm" action="<?= base_url('auth/register'); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="registerName" class="form-label">Full Name</label>
                            <input type="text" name="name" id="registerName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" name="email" id="registerEmail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" name="password" id="registerPassword" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#registerForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);

        console.log("Submitting form..."); // Debugging

        fetch(this.action, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest" // Ensure CI treats it as an AJAX request
            },
            body: formData,
        })
        .then(response => response.json()) // Expect JSON response
        .then(data => {
            console.log("Response:", data);
            if (data.status === "success") {
                alert("Registration successful!");
                window.location.reload();
            } else {
                alert("Error: " + JSON.stringify(data.message)); // Convert object to string
            }
        })
        .catch(error => console.error("Fetch Error:", error));
    });
});

</script>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
