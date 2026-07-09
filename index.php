<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Yono Games Download 2026 - Download All Yono Rummy, Teen Patti & Slots | Get ₹500+ Bonus';
$meta_description = 'Download all latest Yono games, rummy, teen patti, and slots apps at Yono Game Downloads. Get ₹500+ sign up bonus on every app. Updated daily with new gaming apps and offers.';
$meta_keywords = 'yono games download, yono rummy, teen patti, slots games, yono apps download, new yono games, online rummy, teen patti download, yono bonus, yono slots, yono game 2026';
$canonical_url = SITE_URL . '/';
$og_type = 'website';

require_once 'includes/header.php';
$games = getGames(null, 8);
?>
    <section class="hero">
        <div class="container">
            <h1>Yono Games Download 2026 - Download All Yono Rummy, Teen Patti & Slots</h1>
            <p>Yono Game Downloads is the #1 platform for <a href="<?php echo SITE_URL; ?>/allyonogames">downloading all latest Yono games</a>, including Yono Rummy, Teen Patti, Slots, and more. Get ₹500+ sign up bonus on every app. Updated daily with new gaming apps and exclusive offers!</p>
        </div>
    </section>
    
    <section class="toggle-section">
        <div class="container">
            <h2 style="text-align:center;margin-bottom:20px;">Explore Our Latest Games</h2>
            <div class="toggle-buttons">
                <button class="toggle-btn active" data-type="all">⭐ New Games</button>
                <button class="toggle-btn" data-type="trending">🎮 Other Games</button>
            </div>
        </div>
    </section>
    
    <section class="games-section" aria-labelledby="games-heading">
        <div class="container">
            <div class="games-grid" id="gamesContainer" itemscope itemtype="https://schema.org/ItemList">
                <meta itemprop="numberOfItems" content="<?php echo count($games); ?>">
                <?php foreach($games as $index => $game): ?>
                <div class="game-card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Product">
                    <meta itemprop="position" content="<?php echo $index + 1; ?>">
                    <span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;"><?php echo $index + 1; ?></span>
                    <img src="<?php echo htmlspecialchars(getGameImageUrl($game['image'])); ?>" alt="<?php echo htmlspecialchars($game['title']); ?> game logo" class="game-card-image" loading="lazy" itemprop="image">
                    <div class="game-card-content">
                        <h3 class="game-card-title" itemprop="name"><?php echo htmlspecialchars($game['title']); ?></h3>
                        <div class="game-card-meta" itemprop="description">
                            🎁 Sign Up Bonus: ₹<?php echo htmlspecialchars($game['bonus'] ?? '500'); ?><br>
                            💰 Min. Withdraw: ₹<?php echo htmlspecialchars($game['withdraw'] ?? '100'); ?>
                        </div>
                    </div>
                    <div class="game-card-actions">
                        <a href="<?php echo SITE_URL; ?>/<?php echo urlencode($game['slug']); ?>" class="btn-download" aria-label="Download <?php echo htmlspecialchars($game['title']); ?>" itemprop="url">Download</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="page-content">
        <div class="container">
            <div class="about-card">
                <h2>Welcome to Yono Game Downloads - Your #1 Source for Yono Apps</h2>
                <p style="color: var(--text-gray);margin-bottom: 15px;line-height: 1.8;"><?php echo SITE_NAME; ?> is your trusted platform for discovering and <a href="<?php echo SITE_URL; ?>/allyonogames">downloading the latest online gaming applications</a>. We curate a regularly updated collection of games with detailed reviews, bonus information, and secure download links.</p>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Whether you're looking for <strong>card games</strong>, <strong>Yono Rummy</strong>, <strong>Teen Patti</strong>, <strong>Slots</strong>, or other premium gaming platforms, we bring you all the latest releases in one convenient location. Learn more <a href="<?php echo SITE_URL; ?>/about">about us</a> or <a href="<?php echo SITE_URL; ?>/contact">contact us</a> for any queries!</p>
                
                <h3>Why Choose <?php echo SITE_NAME; ?> for Yono Games Download?</h3>
                <ul style="color: var(--text-gray);margin-left: 25px;margin-bottom: 20px;line-height: 1.8;">
                    <li>Daily updated game collection with new releases</li>
                    <li>Verified and secure download links</li>
                    <li>Mobile-optimized website for seamless browsing</li>
                    <li>Comprehensive game details and bonus information</li>
                    <li>User-friendly interface for easy navigation</li>
                    <li>Safe and secure browsing experience</li>
                </ul>
                
                <h3>Popular Yono Game Categories</h3>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Explore our diverse range of gaming categories including <a href="<?php echo SITE_URL; ?>/allyonogames?category=Rummy" style="color: var(--primary-color);">Yono Rummy</a>, <a href="<?php echo SITE_URL; ?>/allyonogames?category=Teen%20Patti" style="color: var(--primary-color);">Teen Patti</a>, <a href="<?php echo SITE_URL; ?>/allyonogames?category=Slots" style="color: var(--primary-color);">Slots</a>, and more. Each game listing includes detailed information about features, bonuses, and minimum withdrawal limits to help you make informed choices.</p>
                
                <h3>Frequently Asked Questions</h3>
                <div itemscope itemtype="https://schema.org/FAQPage">
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">Is <?php echo SITE_NAME; ?> safe to use?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">Yes, <?php echo SITE_NAME; ?> is a safe platform for informational purposes. We do not host any APK files ourselves; instead, we provide links to official download sources. Always ensure you download from trusted sources and play responsibly.</p>
                        </div>
                    </div>
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">How often are new Yono games added?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">We update our game collection daily to ensure you have access to the latest releases and updates from the best Yono gaming apps available.</p>
                        </div>
                    </div>
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">Do you provide bonus information for Yono apps?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">Yes! Each Yono game listing includes detailed information about welcome bonuses, minimum withdrawal amounts, and other key features to help you choose the right game for you.</p>
                        </div>
                    </div>
                </div>
                
                <h3>Responsible Gaming Notice</h3>
                <p style="color: var(--text-gray);line-height: 1.8;">Please remember that gaming involves financial risk and is intended for users aged 18 and above. Play responsibly and within your means. This website is for informational purposes only.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>