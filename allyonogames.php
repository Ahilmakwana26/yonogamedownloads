<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'All Yono Games - Download Yono Rummy, Teen Patti & Slots | ' . SITE_NAME;
$meta_description = 'Browse our complete collection of Yono games, Yono rummy, teen patti, and slots apps. Filter by category and find your favorite games with all details and download links.';
$meta_keywords = 'all yono games, yono games download, yono rummy, teen patti, slots games';
$canonical_url = SITE_URL . '/allyonogames';
$og_type = 'website';

$category = isset($_GET['category']) ? sanitizeInput($_GET['category']) : null;
$games = getGames($category);
$categories = getCategories();

require_once 'includes/header.php';
?>
    <section class="hero">
        <div class="container">
            <h1>All Yono Games</h1>
            <p>Browse our complete collection of Yono games, Yono rummy, teen patti, and slots apps. Filter by category and find your favorite games with all details and download links.</p>
        </div>
    </section>
    
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">All Yono Games</h1>
            
            <div class="filter-buttons">
                <button class="filter-btn active" data-category="">All</button>
                <?php foreach($categories as $cat): ?>
                <button class="filter-btn" data-category="<?php echo htmlspecialchars($cat['name']); ?>"><?php echo htmlspecialchars($cat['name']); ?></button>
                <?php endforeach; ?>
            </div>
            
            <div class="games-grid" id="gamesContainer">
                <?php foreach($games as $index => $game): ?>
                <div class="game-card">
                    <span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;"><?php echo $index + 1; ?></span>
                    <img src="<?php echo htmlspecialchars(getGameImageUrl($game['image'])); ?>" alt="<?php echo htmlspecialchars($game['title']); ?>" class="game-card-image" loading="lazy">
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
