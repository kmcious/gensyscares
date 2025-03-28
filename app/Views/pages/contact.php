<?= view('layout/header', ['title' => 'Contact']) ?>

<link rel="stylesheet" href="<?= base_url('assets/css/contact.css'); ?>">

<section class="contact-section">
    <div class="container">
        <div class="contact-content">
            <!-- Left Side: Google Map & Info -->
            <div class="left-side">
                <div class="map-container">
                    <!-- Google Maps Embed -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.248701335741!2d120.96551131136306!3d14.41282178158693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3f63d83ff69%3A0xae981fffdd5cd461!2sPlazuela%20De%20Molino!5e0!3m2!1sen!2sph!4v1743139855524!5m2!1sen!2sph" 
                        width="100%" height="300" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy"></iframe>
                    <p class="map-text">📍 Plazuela De Molino, Bacoor, Cavite</p>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="right-side">
                <h3>Get In Touch</h3>
                <p>We’d love to hear from you! Fill out the form below and we’ll get back to you soon.</p>

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


<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>
