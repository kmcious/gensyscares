<?= view('layout/header', ['title' => 'About Us']) ?>  
<link rel="stylesheet" href="<?= base_url('/assets/css/about.css'); ?>">
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">
<!-- Loader -->
<div id="loader">
    <img src="<?= base_url('/images/logo/bouncing-circles.svg'); ?>" alt="Loading..." class="svg-loader">
</div>

<!-- Page Content -->
<div id="content">
     <!-- About Gensys Cares Section -->
     <section class="about-section">
        <div class="image-stack">
            <img src="images/homepage pics/Gensys cares.png" alt="Gensys Cares">
        </div>
        <div class="about-text">
            <h2>ABOUT GENSYS CARES</h2>
            <p>Gensys Cares is dedicated to bridging the gap in technology and education by offering accessible IT solutions.
               Our mission is to empower individuals and businesses by providing innovative, reliable, and efficient technology services.
               We strive to make a meaningful impact on communities, ensuring that everyone has the opportunity to thrive in the digital age.</p>
        </div>
    </section>

    <section class="mission-section">
        <div class="image-stack">
            <img src="images/homepage pics/hp5.png" alt="Student">
        </div>
        <div class="mission-text">
            <h2>MISSION</h2>
            <p>Our mission is to empower businesses through innovative and reliable IT solutions.
                We are committed to providing exceptional service and support, tailored to the unique needs of each client. 
                As our goal is to enhance operational efficiency, foster growth, and drive success by leveraging the latest technologies and best practices in the industry. We strive to build long-lasting partnerships with our clients, helping them navigate the complexities of the digital landscape with confidence and ease.</p>
        </div>
    </section>

    <section class="vision-section">
        <div class="image-stack">
            <img src="images/homepage pics/hp6.png" alt="Student">
        </div>
        <div class="vision-text">
            <h2>VISION</h2>
            <p>Our vision is to be the leading provider of innovative IT solutions, recognized for our commitment to excellence and our ability to transform businesses through technology.
                We aspire to create a world where businesses of all sizes can seamlessly integrate advanced IT infrastructure, unlocking their full potential and achieving unparalleled success. By continuously advancing our expertise and staying at the forefront of technological advancements, we aim to set the standard for quality and reliability in the IT services industry.</p>
        </div>
    </section>
</div>

<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>

<!-- Modern Loader Styles -->


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

