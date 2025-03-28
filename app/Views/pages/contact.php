<?= view('layout/header', ['title' => 'Contact']) ?>

<link rel="stylesheet" href="<?= base_url('assets/css/contact.css'); ?>">

<!-- Loader -->
<div id="loader">
<img src="<?= base_url('/images/logo/bouncing-circles.svg'); ?>" alt="Loading..." class="svg-loader">
</div>

<!-- Page Content -->
<div id="content">
    <section class="contact-section">
        <div class="container">
            <div class="contact-content">
                <!-- Left Side: Embedded Google Map & Location -->
                <div class="left-side">
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.248701335741!2d120.96551131136306!3d14.41282178158693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3f63d83ff69%3A0xae981fffdd5cd461!2sPlazuela%20De%20Molino!5e0!3m2!1sen!2sph!4v1743139855524!5m2!1sen!2sph"
                            width="100%" height="300" style="border-radius: 10px; border: none;" allowfullscreen="" loading="lazy">
                        </iframe>
                        <p class="map-text">📍 Plazuela De Molino, Bacoor, Cavite</p>
                    </div>
                </div>

                <!-- Right Side: Contact Form -->
                <div class="right-side">
                    <h3>Get In Touch</h3>
                    <p>We’d love to hear from you! Fill out the form below, and we’ll get back to you soon.</p>
                    <form action="<?= base_url('contact/submit'); ?>" method="post">
                        <div class="input-group">
                            <span class="icon">👤</span>
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="input-group">
                            <span class="icon">✉️</span>
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <textarea name="message" placeholder="Your Message"></textarea>
                        <button type="submit" class="send-button">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>

<!-- Modern Loader Styles -->
<style>
    /* Loader */
    #loader {
        position: fixed;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, #FAF7E5 0%, #91B7D1 90%); 
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .svg-loader {
        width: 80px; /* Adjust the size as needed */
        height: auto;
    }

    /* Initially Hide Content */
    #content {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
</style>

<!-- JavaScript for Smooth Transition -->
<script>
    window.addEventListener("load", function() {
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.opacity = "1";
            document.getElementById("content").style.transform = "translateY(0)";
        }, 1200); // Loader stays for 1.2 seconds before disappearing
    });
</script>

