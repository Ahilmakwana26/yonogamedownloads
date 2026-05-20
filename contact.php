<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Contact Us';
$meta_description = 'Contact Yono Games - Join our Telegram channel for updates';

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container contact-container">
            <h1 class="page-title">Contact Us</h1>
            
            <div class="contact-card">
                <h2>Get in Touch</h2>
                <p>Join our Telegram channel for the latest updates, news, and game releases.</p>
                <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-primary" target="_blank">Join Telegram Now</a>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>