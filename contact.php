<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Contact Us - ' . SITE_NAME;
$meta_description = 'Contact ' . SITE_NAME . ' - Join our Telegram channel for the latest game updates, bonuses, and announcements.';
$canonical_url = SITE_URL . '/contact';
$og_type = 'website';

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container contact-container">
            <h1 class="page-title">Contact Us</h1>
            
            <div class="contact-card">
                <h2>Contact Us</h2>
                <p style="color: var(--text-gray);margin-bottom: 20px;">For questions, suggestions, copyright issues, or business contacts, please don't hesitate to reach us via our official Telegram channel.</p>
                <p style="color: var(--text-gray);margin-bottom: 20px;">We aim to get back to you at the earliest and we value any kind of user feedback.</p>
                
                <h3 style="font-size: 20px;margin-bottom: 15px;">Official Telegram</h3>
                <p style="color: var(--text-gray);margin-bottom: 15px;">Join the Telegram group and stay updated with our latest game releases.</p>
                <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-primary" target="_blank">👉 Join Telegram Channel</a>
                
                <div style="margin-top: 30px;">
                    <h3 style="font-size: 18px;margin-bottom: 10px;">Support Working Hours</h3>
                    <p style="color: var(--text-gray);margin-bottom: 5px;">Monday to Saturday</p>
                    <p style="color: var(--text-gray);">10:00 AM to 8:00 PM</p>
                </div>
                
                <p style="color: var(--text-gray);margin-top: 25px;">Thank you for visiting <?php echo SITE_NAME; ?>.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>