<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Homepage
echo '  <url>' . "\n";
echo '    <loc>' . htmlspecialchars(SITE_URL) . '/</loc>' . "\n";
echo '    <changefreq>daily</changefreq>' . "\n";
echo '    <priority>1.0</priority>' . "\n";
echo '  </url>' . "\n";

// Games listing page
echo '  <url>' . "\n";
echo '    <loc>' . htmlspecialchars(SITE_URL) . '/yono-games</loc>' . "\n";
echo '    <changefreq>daily</changefreq>' . "\n";
echo '    <priority>0.9</priority>' . "\n";
echo '  </url>' . "\n";

// About page
echo '  <url>' . "\n";
echo '    <loc>' . htmlspecialchars(SITE_URL) . '/about</loc>' . "\n";
echo '    <changefreq>monthly</changefreq>' . "\n";
echo '    <priority>0.7</priority>' . "\n";
echo '  </url>' . "\n";

// Contact page
echo '  <url>' . "\n";
echo '    <loc>' . htmlspecialchars(SITE_URL) . '/contact</loc>' . "\n";
echo '    <changefreq>monthly</changefreq>' . "\n";
echo '    <priority>0.7</priority>' . "\n";
echo '  </url>' . "\n";

// Game detail pages
$games = getGames();
foreach ($games as $game) {
    echo '  <url>' . "\n";
    echo '    <loc>' . htmlspecialchars(SITE_URL) . '/' . urlencode($game['slug']) . '</loc>' . "\n";
    echo '    <lastmod>' . date('Y-m-d', strtotime($game['created_at'] ?? 'now')) . '</lastmod>' . "\n";
    echo '    <changefreq>weekly</changefreq>' . "\n";
    echo '    <priority>0.8</priority>' . "\n";
    echo '  </url>' . "\n";
}

echo '</urlset>' . "\n";
?>