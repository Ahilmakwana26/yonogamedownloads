<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Privacy Policy';
$meta_description = 'Read our privacy policy to understand how we collect, use, and protect your information';

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">Privacy Policy</h1>
            
            <div class="card" style="padding:40px;margin-top:30px;">
                <h2 style="margin-bottom:20px;">Privacy Policy</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">At <?php echo SITE_NAME; ?>, we value the privacy of our visitors. This Privacy Policy explains how we collect, use, and protect user information when you visit our website.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Information We Collect</h2>
                <p style="margin-bottom:15px;line-height:1.8;color:var(--text-gray);">We may collect basic non-personal information such as:</p>
                <ul style="margin-left:25px;margin-bottom:20px;line-height:1.8;color:var(--text-gray);">
                    <li style="margin-bottom:10px;">Browser type</li>
                    <li style="margin-bottom:10px;">Device information</li>
                    <li style="margin-bottom:10px;">Pages visited</li>
                    <li style="margin-bottom:10px;">Website usage statistics</li>
                </ul>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">This information helps us improve website performance and user experience.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Cookies</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">Our website may use cookies to improve browsing experience, remember preferences, and analyze website traffic.</p>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">Users can disable cookies through their browser settings if they prefer.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Third-Party Links</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">Our website may contain links to third-party websites or applications. We are not responsible for the privacy practices or content of external websites.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Data Protection</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">We do not sell or share personal user information with third parties. We take reasonable steps to maintain website security and protect user data.</p>
                
                <h2 style="margin-bottom:20px;margin-top:30px;">Policy Updates</h2>
                <p style="margin-bottom:20px;line-height:1.8;color:var(--text-gray);">We may update this Privacy Policy at any time without prior notice. Users are encouraged to check this page regularly for updates.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>