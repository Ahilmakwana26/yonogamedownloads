<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';

$category = isset($_GET['category']) ? sanitizeInput($_GET['category']) : null;
$type = isset($_GET['type']) ? sanitizeInput($_GET['type']) : null;

$games = getGames($category, 8);

if (empty($games)) {
    echo '<div style="text-align:center;padding:60px;">No games found.</div>';
} else {
    foreach($games as $index => $game) {
        echo '<div class="game-card">';
        echo '<span style="position:absolute;left:10px;top:10px;background:#000;color:#fff;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;">' . ($index + 1) . '</span>';
        echo '<img src="' . ($game['image'] ? htmlspecialchars($game['image']) : ' ') . '" alt="' . htmlspecialchars($game['title']) . '" class="game-card-image" loading="lazy">';
        echo '<div class="game-card-content">';
        echo '<h3 class="game-card-title">' . htmlspecialchars($game['title']) . '</h3>';
        echo '<div class="game-card-meta">🎁 Sign Up Bonus: ₹' . htmlspecialchars($game['bonus'] ?? '500') . '<br>💰 Min. Withdraw: ₹' . htmlspecialchars($game['withdraw'] ?? '100') . '</div>';
        echo '</div>';
        echo '<div class="game-card-actions">';
        echo '<a href="' . SITE_URL . '/' . urlencode($game['slug']) . '" class="btn-download">Download</a>';
        echo '</div>';
        echo '</div>';
    }
}
?>