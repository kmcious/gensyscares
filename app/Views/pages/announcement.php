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

<!-- Events Container -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <h2 class="text-center mb-4 fw-bold">📢 Upcoming Events</h2>
            <div class="row row-cols-1 g-4">
                <?php
                // Set the number of items per page
                $perPage = 5;

                // Get current page from URL, default to page 1 if not provided
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                // Get total number of announcements
                $totalAnnouncements = count($announcements);  // Assuming $announcements is the array with all announcements

                // Calculate the total number of pages
                $totalPages = ceil($totalAnnouncements / $perPage);

                // Calculate the offset for the current page
                $offset = ($currentPage - 1) * $perPage;

                // Slice the announcements array to get the announcements for the current page
                $pagedAnnouncements = array_slice($announcements, $offset, $perPage);
                ?>

                <?php if (!empty($pagedAnnouncements)) : ?>
                    <?php foreach ($pagedAnnouncements as $announcement) : ?>
                        <div class="col">
                            <div class="card event-card shadow-lg">
                                <div class="row g-0">
                                    <!-- Image (Left Side) -->
                                    <div class="col-md-4">
                                        <img src="<?= base_url($announcement['image_path']); ?>" 
                                             alt="<?= esc($announcement['title']); ?>" 
                                             class="img-fluid event-img">
                                    </div>
                                    <!-- Text Content (Right Side) -->
                                    <div class="col-md-8">
                                        <div class="card-body d-flex flex-column justify-content-center">
                                            <h5 class="card-title fw-bold text-justify mb-2"><?= esc($announcement['title']); ?></h5>
                                            <p class="card-text text-justify mb-2"><strong>📅 When:</strong> <?= date('F d, Y', strtotime($announcement['event_date'])); ?></p>
                                            <p class="card-text text-justify mb-2"><strong>📍 Where:</strong> <?= esc($announcement['location']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav>
                            <ul class="pagination">
                                <?php if ($currentPage > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage - 1; ?>">⬅️ Previous</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $currentPage + 1; ?>">Next ➡️</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>

                <?php else : ?>
                    <div class="alert alert-info text-center w-100">
                        No announcements available at the moment.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<style>
   
.event-card {
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.event-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Image Styling (Left Side) */
.event-img {
    width: 100%;
    height: 100%; /* Makes the image fill its container */
    object-fit: cover; /* Ensures the image is fully displayed without cropping */
    border-radius: 12px 0 0 12px; /* Keeps rounded corners on the left side */
}

/* Card Body Styling (Right Side) */
.card-body {
    padding: 16px;
}

/* Text Styling */
.card-title {
    font-size: 3.1rem; /* Increased title size */
    font-weight: bold;
}
.card-text {
    font-size: 1.2rem; /* Increased body text size */
    line-height: 1.5;
}



/* Removes Extra Margins */
.mb-2 {
    margin-bottom: 6px !important;
}
.mb-0 {
    margin-bottom: 0 !important;
}

/* Responsive Row Spacing */
.row.g-4 {
    gap: 10px;
}
 /* Pagination Styling */
 .pagination {
        display: flex;
        list-style: none;
        padding-left: 0;
        border-radius: 5px;
    }
    .pagination .page-item {
        margin: 0 5px;
    }
    .pagination .page-link {
        color: #007bff;
        text-decoration: none;
    }
    .pagination .active .page-link {
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
    }

</style>






1<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<link rel="stylesheet" href="/assets/css/footerstyle.css">
<?= view('layout/footer') ?>

