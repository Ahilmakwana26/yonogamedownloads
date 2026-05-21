<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'About Us';
$meta_description = 'Learn more about ' . SITE_NAME . ' - your trusted source for premium gaming apps';

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container about-section">
            <h1 class="page-title">About Us</h1>
            
            <div class="about-card">
                <h2>About <?php echo SITE_NAME; ?></h2>
                <p style="color: var(--text-gray);margin-bottom: 15px;line-height: 1.8;">At <?php echo SITE_NAME; ?>, we provide an easy-to-use platform for our users where they can view trending games, get acquainted with features, and obtain APK download links.</p>
                <p style="color: var(--text-gray);line-height: 1.8;">We aim at creating a quick and mobile-friendly platform where the visitor will be able to get all the info about trending gaming applications and bonuses.</p>
            </div>
            
            <div class="about-card">
                <h2>What We Offer</h2>
                <ul style="color: var(--text-gray);margin-left: 25px;line-height: 1.8;">
                    <li>Collections of Yono and gaming applications</li>
                    <li>Trending game info and bonuses</li>
                    <li>Links to the APK download pages</li>
                    <li>Easy mobile browsing for all users</li>
                    <li>Up-to-date information about trending gaming applications</li>
                </ul>
            </div>
            
            <div class="about-card">
                <h2>Our Objective</h2>
                <p style="color: var(--text-gray);margin-bottom: 15px;line-height: 1.8;">Our objective is to create an easy-to-use gaming platform that would help our users to find new applications without spending hours browsing different sites.</p>
            </div>
            
            <div class="about-card">
                <h2>UX First Approach</h2>
                <p style="color: var(--text-gray);line-height: 1.8;">We always try to make changes to our site design and improve content loading speed.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>