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
            <div class="hero-buttons">
                <a href="<?php echo SITE_URL; ?>/list" class="btn-primary">Browse Games</a>
                <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-secondary" target="_blank">Join Telegram</a>
            </div>
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
                    <img src="<?php echo $game['image'] ? htmlspecialchars($game['image']) : 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern%20casino%20game%20logo%20dark%20theme&image_size=square_hd'; ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="game-card-image">
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
<?php require_once 'includes/footer.php'; ?>