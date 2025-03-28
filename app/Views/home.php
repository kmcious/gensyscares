<!-- Load Navbar Before Loader -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<?= view('layout/header', ['title' => 'Home']) ?> 
<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">

<!-- Loader (Excludes Navbar) -->
<div id="loader">
    <img src="<?= base_url('/images/logo/bouncing-circles.svg'); ?>" alt="Loading..." class="svg-loader">
</div>

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
        width: 80px;
        height: auto;
    }

    /* Ensure Content Excludes Navbar */
    #page-content {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
</style>

<!-- JavaScript to Hide Loader -->
<script>
    window.addEventListener("load", function() {
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
            document.getElementById("page-content").style.opacity = "1";
            document.getElementById("page-content").style.transform = "translateY(0)";
        }, 1200);
    });
</script>

<!-- Page Content (Excluding Navbar) -->
<div id="page-content">
    <section class="gensys-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 text-center text-lg-start">
                    <h1 class="gensys-title">
                        “ <span class="highlight">EMPOWERING LIVES TO GROW AND TRANSFORM, CREATING A FUTURE OF POSSIBILITIES</span> ”
                    </h1>
                    <p class="gensys-subtext">
                        Children who are in Grade School, High School, Senior High, or College <br>
                        Studying in a Public School at Imus or Bacoor Cavite
                    </p>
                    <div class="search-container">
                        <input type="text" placeholder="Search here..." class="search-box">
                        <button class="search-button">SEARCH</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                    <div class="gensys-image-container">
                        <img src="images/homepage pics/hp1.png" alt="Gensys Team" class="gensys-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gensys-initiatives">
        <div class="container">
            <h2 class="section-header">Join Our Gensys Community Initiatives</h2>
            <p class="section-subtext">Be part of meaningful projects that create positive change.</p>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="images/homepage pics/explore1.png" alt="Gensys Cares">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="images/homepage pics/explore2.png" alt="Blood Donation">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="images/homepage pics/explore3.png" alt="100 Scholars Program">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="initiative-card">
                        <div class="initiative-image">
                            <img src="images/homepage pics/explore4.png" alt="Coastal Cleanup Drive">
                        </div>
                        <button class="explore-btn">EXPLORE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".initiative-card");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    }, { threshold: 0.2 });

    cards.forEach(card => observer.observe(card));
});

    </script>

    <section class="feature-section">
        <div class="feature-container">
            <div class="feature-image">
                <img src="images/homepage pics/hp2.png" alt="Feature Image">
            </div>
            <div class="feature-content">
                <h2>Sustainability Through Smart Solutions</h2>
                <p>Empowering communities with innovative solutions. At Gensys Cares, we are committed to creating opportunities, transforming lives, and building a future where technology and compassion come together for a better tomorrow. </p>
                <a href="#" class="see-more-btn">SEE MORE</a>
            </div>
        </div>
    </section>

    <section class="feature-section2">
    <div class="feature-container2">
        <div class="feature-content2">
            <h2>Educate, Elevate, Empower</h2>
            <p>Education is the foundation of progress. Gensys Cares supports digital learning, scholarships, and technology-driven education to equip individuals with the skills they need to thrive in a rapidly evolving world.</p>
            <a href="#" class="see-more-btn2">SEE MORE</a>
        </div>
        <div class="feature-image2">
            <img src="images/homepage pics/hp4.png" alt="Feature Image">
        </div>
    </div>
</section>

</div>



<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>
