
<?= view('layout/header', ['title' => 'Announcement']) ?>
<link rel="stylesheet" href="/assets/css/announcementstyle.css">



<section class="gensys-section">
    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Search here...">
            <button class="search-btn">SEARCH</button>
        </div>
        
        <div class="announcement-list">
            <div class="announcement-card">
                <div class="image">
                    <img src="/assets/images/coastal-cleanup.jpg" alt="Coastal Clean-up Drive">
                </div>
                <div class="content">
                    <p><strong>WHAT:</strong> Coastal Clean-up Drive</p>
                    <p><strong>WHEN:</strong> December 28, 2024</p>
                    <p><strong>WHERE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            
            <div class="announcement-card">
                <div class="image">
                    <img src="/assets/images/blood-donation.jpg" alt="Blood Donation Appeal">
                </div>
                <div class="content">
                    <p><strong>WHAT:</strong> Blood Donation Appeal</p>
                    <p><strong>WHEN:</strong> December 28, 2024</p>
                    <p><strong>WHERE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            
            <div class="announcement-card">
                <div class="image">
                    <img src="/assets/images/christmas-party.jpg" alt="Gensys Cares Christmas Party">
                </div>
                <div class="content">
                    <p><strong>WHAT:</strong> Gensys Cares Christmas Party</p>
                    <p><strong>WHEN:</strong> December 22, 2024</p>
                    <p><strong>WHERE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            <div class="announcement-card">
                <div class="image">
                    <img src="/assets/images/christmas-party.jpg" alt="Gensys Cares Christmas Party">
                </div>
                <div class="content">
                    <p><strong>WHAT:</strong> Gensys Cares Christmas Party</p>
                    <p><strong>WHEN:</strong> December 22, 2024</p>
                    <p><strong>WHERE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
          
        </div>
    </div>
</section>


<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>

