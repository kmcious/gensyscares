
<?= view('layout/header', ['title' => 'Announcement']) ?>
<link rel="stylesheet" href="/assets/css/announcementstyle.css">

<style>
    body {
    background: linear-gradient(to bottom, #FAF7E5 0%, #91B7D1 80%); 
    font-family: 'Inter', sans-serif !important;
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

