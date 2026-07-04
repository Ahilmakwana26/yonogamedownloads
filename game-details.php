<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

if (!isset($_GET['slug'])) {
    header('Location: ' . SITE_URL . '/list');
    exit;
}

$slug = sanitizeInput($_GET['slug']);
$game = getGameBySlug($slug);

if (!$game) {
    header('Location: ' . SITE_URL . '/list');
    exit;
}

$page_title = $game['meta_title'] ?? $game['title'];
$meta_description = $game['meta_description'] ?? substr($game['description'] ?? '', 0, 160);
$meta_keywords = $game['meta_keyword'] ?? '';

$relatedGames = getGames($game['category_name'], 4);

require_once 'includes/header.php';
?>
    <section class="game-details">
        <div class="container">
            <div class="game-details-container">
                <div class="game-sidebar">
                    <div class="game-logo-section">
                        <img src="<?php echo $game['image'] ? htmlspecialchars($game['image']) : 'https://coresg-normal.trae.ai/api/ide/v1/text_to_image?prompt=modern%20casino%20game%20logo%20dark%20theme&image_size=square_hd'; ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="game-logo">
                        
                        <div class="game-quick-info">
                            <div class="quick-info-item">
                                <span class="quick-info-label">Version</span>
                                <span class="quick-info-value"><?php echo htmlspecialchars($game['version'] ?? '1.0'); ?></span>
                            </div>
                            <div class="quick-info-item">
                                <span class="quick-info-label">Size</span>
                                <span class="quick-info-value"><?php echo htmlspecialchars($game['size'] ?? '50MB'); ?></span>
                            </div>
                            <div class="quick-info-item">
                                <span class="quick-info-label">Downloads</span>
                                <span class="quick-info-value"><?php echo number_format($game['downloads'] ?? 0); ?>+</span>
                            </div>
                            <div class="quick-info-item">
                                <span class="quick-info-label">Rating</span>
                                <span class="quick-info-value">⭐ <?php echo htmlspecialchars($game['rating'] ?? '4.5'); ?></span>
                            </div>
                        </div>
                        
                        <div class="game-badges">
                            <span class="game-badge">₹<?php echo htmlspecialchars($game['bonus'] ?? '500'); ?> Bonus</span>
                            <span class="game-badge">₹<?php echo htmlspecialchars($game['withdraw'] ?? '100'); ?> Min</span>
                            <span class="game-badge">✅ Verified</span>
                        </div>
                        
                        <a href="<?php echo htmlspecialchars($game['download_link'] ?? '#'); ?>" class="btn-download-large" target="_blank">⬇ Download Apk Now</a>
                        
                        <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram-sidebar" target="_blank">💬 Join Telegram</a>
                    </div>
                </div>
                
                <div class="game-content">
                    <h1><?php echo htmlspecialchars($game['title']); ?> APK Download</h1>
                    
                    <h2>About <?php echo htmlspecialchars($game['title']); ?></h2>
                    <p><?php echo htmlspecialchars($game['description'] ?? 'Yono Games is a popular online gaming platform where users can explore a wide collection of real money earning apps all in one place. From rummy tables to slots and bingo games, users can enjoy multiple categories like Rummy, Slots, Bingo, and Spin games with daily rewards and exciting features.'); ?></p>
                    
                    <h2>How to Download <?php echo htmlspecialchars($game['title']); ?>?</h2>
                    <ul>
                        <li>Click on the Download button</li>
                        <li>Install the APK file</li>
                        <li>Open the app and register</li>
                        <li>Claim your welcome bonus</li>
                    </ul>
                    
                    <h2><?php echo htmlspecialchars($game['title']); ?> Features</h2>
                    <ul>
                        <li>Easy to download and install</li>
                        <li>Regular updates</li>
                        <li>Fast and secure</li>
                        <li>User-friendly interface</li>
                        <li>Multiple payment options</li>
                    </ul>
                    
                    <h3>Is <?php echo htmlspecialchars($game['title']); ?> Safe?</h3>
                    <p>Yes! The platform is 100% safe. Please play responsibly & play as per your fun.</p>
                    
                    <h3>⚠ Important Note</h3>
                    <p>Note: This game involves financial risk. This game is for 18+ Welcome bonus and registration amount may vary with time. This app is only for fun purpose. Before using this app please check your local lows and government guidelines. We are not responsible for any type of financial loss and fraud.</p>
                </div>
            </div>
            
            <?php if (!empty($relatedGames)): ?>
            <div class="related-games">
                <h2>⭐ Related Games You Might Like</h2>
                <div class="games-grid">
                    <?php foreach($relatedGames as $index => $related): ?>
                    <?php if ($related['id'] != $game['id']): ?>
                    <div class="game-card">
                        <span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;"><?php echo $index + 1; ?></span>
                        <img src="<?php echo $related['image'] ? htmlspecialchars($related['image']) : ' '; ?>" alt="<?php echo htmlspecialchars($related['title']); ?>" class="game-card-image" loading="lazy">
                        <div class="game-card-content">
                            <h3 class="game-card-title"><?php echo htmlspecialchars($related['title']); ?></h3>
                            <div class="game-card-meta">
                                🎁 Sign Up Bonus: ₹<?php echo htmlspecialchars($related['bonus'] ?? '500'); ?><br>
                                💰 Min. Withdraw: ₹<?php echo htmlspecialchars($related['withdraw'] ?? '100'); ?>
                            </div>
                        </div>
                        <div class="game-card-actions">
                            <a href="<?php echo SITE_URL; ?>/<?php echo urlencode($related['slug']); ?>" class="btn-download">Download</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php require_once 'includes/footer.php'; ?>
