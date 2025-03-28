<?= view('layout/header', ['title' => 'About Us']) ?>  
<link rel="stylesheet" href="<?= base_url('/assets/css/about.css'); ?>">
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">
<!-- Loader -->
<div id="loader">
    <img src="<?= base_url('/images/logo/bouncing-circles.svg'); ?>" alt="Loading..." class="svg-loader">
</div>

<!-- Page Content -->
<div id="content">
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

