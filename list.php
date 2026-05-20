<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$page_title = 'All Games';
$meta_description = 'Browse all Yono games, rummy, teen patti and more gaming apps';

$category = isset($_GET['category']) ? sanitizeInput($_GET['category']) : null;
$games = getGames($category);
$categories = getCategories();

require_once 'includes/header.php';
?>
    <section class="page-content">
        <div class="container">
            <h1 class="page-title">All Games</h1>
            
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