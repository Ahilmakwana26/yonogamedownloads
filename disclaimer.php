<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Disclaimer - ' . SITE_NAME;
$meta_description = 'Important disclaimer about ' . SITE_NAME . ' - understand our terms, limitations, and responsible gaming guidelines.';
$canonical_url = SITE_URL . '/disclaimer';
$og_type = 'website';
$meta_robots = 'noindex, follow';

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">Disclaimer</h1>
            
            <div class="card" style="padding:40px;margin-top:30px;">
                <h2 style="margin-bottom:20px;">Disclaimer</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);"><?php echo SITE_NAME; ?> is an independent gaming information platform created for educational and entertainment purposes only.</p>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">We do not own or develop any third-party applications listed on this website. All trademarks, logos, and application names belong to their respective owners.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">External Applications</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">We only provide information and access links related to gaming applications. Users download and use third-party apps at their own risk.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">No Financial Guarantee</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">We do not guarantee earnings, rewards, bonuses, or winnings from any application listed on this website. Results may vary for every user.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Responsible Usage</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">Users are advised to use gaming applications responsibly and ensure that online gaming activities are legal in their local region before participating.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Content Accuracy</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">While we try to keep information updated and accurate, we do not guarantee the completeness or reliability of all content available on the website.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>