<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'Home';
$meta_description = 'Download latest Yono games, rummy, teen patti and more premium gaming apps';

require_once 'includes/header.php';
$games = getGames(null, 8);
?>
    <section class="hero">
        <div class="container">
            <h1>Premium Gaming Collection</h1>
            <p>Download the latest Yono games, rummy, teen patti, and premium gaming apps. Fast, secure, and up-to-date downloads.</p>
        </div>
    </section>
    
    <section class="toggle-section">
        <div class="container">
            <h2 style="text-align:center;margin-bottom:20px;">Download NEW YONO Games</h2>
            <div class="toggle-buttons">
                <button class="toggle-btn active" data-type="all">⭐ New Games</button>
                <button class="toggle-btn" data-type="trending">🎮 Other Games</button>
            </div>
        </div>
    </section>
    
    <section class="games-section">
        <div class="container">
            <div class="games-grid" id="gamesContainer">
                <?php foreach($games as $index => $game): ?>
                <div class="game-card">
                    <span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;"><?php echo $index + 1; ?></span>
                    <img src="<?php echo $game['image'] ? htmlspecialchars($game['image']) : ' '; ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="game-card-image" loading="lazy">
                    <div class="game-card-content">
                        <h3 class="game-card-title"><?php echo htmlspecialchars($game['title']); ?></h3>
                        <div class="game-card-meta">
                            🎁 Sign Up Bonus: ₹<?php echo htmlspecialchars($game['bonus'] ?? '500'); ?><br>
                            💰 Min. Withdraw: ₹<?php echo htmlspecialchars($game['withdraw'] ?? '100'); ?>
                        </div>
                    </div>
                    <div class="game-card-actions">
                        <a href="<?php echo SITE_URL; ?>/<?php echo urlencode($game['slug']); ?>" class="btn-download">Download</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <section class="page-content">
        <div class="container">
            <div class="about-card">
                <h2 style="font-size: 28px;font-weight: 800;margin-bottom: 20px;">Welcome to <?php echo SITE_NAME; ?></h2>
                <p style="color: var(--text-gray);margin-bottom: 15px;line-height: 1.8;"><?php echo SITE_NAME; ?> offers an excellent platform that allows you to browse through the latest online gaming and entertainment applications from one website. Get access to a regularly updated list of games with downloads, details about each app, bonuses, and an intuitive user interface.</p>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Are you searching for the latest and most popular card games, color prediction apps, fantasy games, or gaming platforms? Our website can help you get all the latest games in just one click.</p>
                
                <h3 style="font-size: 22px;font-weight: 700;margin-bottom: 15px;">What You Will Get From <?php echo SITE_NAME; ?>?</h3>
                <ul style="color: var(--text-gray);margin-left: 25px;margin-bottom: 20px;line-height: 1.8;">
                    <li>A regularly updated game collection</li>
                    <li>Access to the easiest APK downloads</li>
                    <li>A mobile responsive website</li>
                    <li>An intuitive interface</li>
                    <li>The latest bonus and reward information</li>
                    <li>A safe browsing experience</li>
                </ul>
                
                <h3 style="font-size: 22px;font-weight: 700;margin-bottom: 15px;">Trending Gaming Applications</h3>
                <p style="color: var(--text-gray);margin-bottom: 20px;line-height: 1.8;">Discover a wide range of trending gaming applications on our platform. Get access to such popular apps as <?php echo SITE_NAME; ?>, Teen Patti, rummy games, fantasy sports, and other entertainment platforms.</p>
                
                <h3 style="font-size: 22px;font-weight: 700;margin-bottom: 15px;">Important Note</h3>
                <p style="color: var(--text-gray);line-height: 1.8;">It should be noted that all the games and applications offered by us are exclusively for informational purposes. Please remember to gamble responsibly.</p>
            </div>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>