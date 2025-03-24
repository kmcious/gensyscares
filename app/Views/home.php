<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?= view('layout/header', ['title' => 'Home']) ?> 



<section class="gensys-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Text Content -->
            <div class="col-lg-6 col-md-12 text-center text-lg-start">
                <h1 class="gensys-title">
                    “ <span class="highlight">EMPOWERING LIVES TO GROW AND TRANSFORM, CREATING A FUTURE OF POSSIBILITIES</span> ”
                </h1>
                <p class="gensys-subtext">
                    Children who are in Grade School, High School, Senior High, or College <br>
                    Studying in a Public School at Imus or Bacoor Cavite
                </p>
                <!-- Search Box -->
                <div class="search-container">
                    <input type="text" placeholder="Search here..." class="search-box">
                    <button class="search-button">SEARCH</button>
                </div>
            </div>

            <!-- Right Side: Image -->
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
        <br><br>
    <h2 class="section-header">Join Our Gensys Community Initiatives</h2>
            <p class="section-subtext">Be part of meaningful projects that create positive change.</p>

        <div class="row justify-content-center">
            <!-- Initiative Cards -->
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



<section class="feature-section">
    <div class="feature-container">
        <div class="feature-image">
            <img src="images/homepage pics/hp2.png" alt="Feature Image">
        </div>
        <div class="feature-content">
            <h2>Lorem ipsum dolor sit amet. Et dolores praesentium</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.</p>
            <a href="#" class="see-more-btn">SEE MORE</a>
        </div>
    </div>
</section>








<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>
