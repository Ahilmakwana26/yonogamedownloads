<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Yono Game Downloads - Discover & Download Premium Gaming Apps';
$meta_description = 'Discover and download the latest Yono games, rummy, teen patti, and premium gaming apps at Yono Game Downloads. Updated daily with new games and bonus offers.';
$canonical_url = SITE_URL . '/';
$og_type = 'website';

require_once 'includes/header.php';
$games = getGames(null, 8);
?>
    <section class="hero">
        <div class="container">
            <h1>Discover & Download Premium Gaming Apps</h1>
            <p>Explore our curated collection of the latest Yono games, rummy, teen patti, and more. Fast, secure downloads with daily updates.</p>
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
            <div class="games-grid" id="gamesContainer">
                <?php foreach($games as $index => $game): ?>
                <div class="game-card">
                    <span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;"><?php echo $index + 1; ?></span>
                    <img src="<?php echo $game['image'] ? htmlspecialchars($game['image']) : ' '; ?>" alt="<?php echo htmlspecialchars($game['title']); ?> game logo" class="game-card-image" loading="lazy">
                    <div class="game-card-content">
                        <h3 class="game-card-title"><?php echo htmlspecialchars($game['title']); ?></h3>
                        <div class="game-card-meta">
                            🎁 Sign Up Bonus: ₹<?php echo htmlspecialchars($game['bonus'] ?? '500'); ?><br>
                            💰 Min. Withdraw: ₹<?php echo htmlspecialchars($game['withdraw'] ?? '100'); ?>
                        </div>
                    </div>
                    <div class="game-card-actions">
                        <a href="<?php echo SITE_URL; ?>/<?php echo urlencode($game['slug']); ?>" class="btn-download" aria-label="Download <?php echo htmlspecialchars($game['title']); ?>">Download</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="page-content">
        <div class="container">
            <div class="about-card">
                <h2>Welcome to <?php echo SITE_NAME; ?></h2>
                <p style="color: var(--text-gray);margin-bottom: 15px;line-height: 1.8;"><?php echo SITE_NAME; ?> is your trusted platform for discovering and downloading the latest online gaming applications. We curate a regularly updated collection of games with detailed reviews, bonus information, and secure download links.</p>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Whether you're looking for card games, rummy, teen patti, or other premium gaming platforms, we bring you all the latest releases in one convenient location.</p>
                
                <h3>Why Choose <?php echo SITE_NAME; ?>?</h3>
                <ul style="color: var(--text-gray);margin-left: 25px;margin-bottom: 20px;line-height: 1.8;">
                    <li>Daily updated game collection with new releases</li>
                    <li>Verified and secure download links</li>
                    <li>Mobile-optimized website for seamless browsing</li>
                    <li>Comprehensive game details and bonus information</li>
                    <li>User-friendly interface for easy navigation</li>
                    <li>Safe and secure browsing experience</li>
                </ul>
                
                <h3>Trending Game Categories</h3>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Explore our diverse range of gaming categories including rummy, teen patti, slots, and more. Each game listing includes detailed information about features, bonuses, and minimum withdrawal limits to help you make informed choices.</p>
                
                <h3>Frequently Asked Questions</h3>
                <div itemscope itemtype="https://schema.org/FAQPage">
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">Is <?php echo SITE_NAME; ?> safe to use?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">Yes, <?php echo SITE_NAME; ?> is a safe platform for informational purposes. We do not host any APK files ourselves; instead, we provide links to official download sources. Always ensure you download from trusted sources and play responsibly.</p>
                        </div>
                    </div>
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">How often are new games added?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">We update our game collection regularly to ensure you have access to the latest releases and updates from the best gaming apps available.</p>
                        </div>
                    </div>
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name">Do you provide bonus information?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: var(--text-gray);">Yes! Each game listing includes detailed information about welcome bonuses, minimum withdrawal amounts, and other key features to help you choose the right game for you.</p>
                        </div>
                    </div>
                </div>
                
                <h3>Responsible Gaming Notice</h3>
                <p style="color: var(--text-gray);line-height: 1.8;">Please remember that gaming involves financial risk and is intended for users aged 18 and above. Play responsibly and within your means. This website is for informational purposes only.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>