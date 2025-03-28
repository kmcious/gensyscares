<link rel="icon" type="image/png" href="<?= base_url('/images/logo/logo1.png'); ?>">
<?= view('layout/header', ['title' => 'Announcement']) ?>
<link rel="stylesheet" href="/assets/css/announcementstyle.css">
<!-- Loader -->
<div id="loader">
    <img src="<?= base_url('/images/logo/bouncing-circles.svg'); ?>" alt="Loading..." class="svg-loader">
</div>
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
<style>
    body {
    background: linear-gradient(to bottom, #FAF7E5 0%, #91B7D1 80%); 
    font-family: 'Poppins', sans-serif !important;
}
</style>

<div class="search-bar">
    <input type="text" placeholder="Search here...">
    <button>SEARCH</button>
</div>

<!-- Events container -->
<div class="events-wrapper">
        <div class="events-container">
            <?php if (!empty($announcements)) : ?>
                <?php foreach ($announcements as $announcement) : ?>
                    <div class="event-card">
                        <div class="event-image">
                            <img src="<?= base_url( $announcement['image_path']); ?>" 
                                 alt="<?= esc($announcement['title']); ?>" 
                                 class="event-img">
                        </div>
                        <div class="event-details">
                            <div class="event-row">
                                <span class="label">WHAT:</span>
                                <span class="value"><?= esc($announcement['title']); ?></span>
                            </div>
                            <div class="event-row">
                                <span class="label">WHEN:</span>
                                <span class="value"><?= date('F d, Y', strtotime($announcement['event_date'])); ?></span>
                            </div>
                            <div class="event-row">
                                <span class="label">WHERE:</span>
                                <span class="value"><?= esc($announcement['location']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No announcements available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>




1<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>

