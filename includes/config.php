<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'yonogamedownloads');

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

if ($host === 'yonogamedownloads.com' || $host === 'www.yonogamedownloads.com') {
    define('SITE_URL', 'https://yonogamedownloads.com');
} else {
    // Calculate base path to root directory (even from admin pages)
    $script_name = $_SERVER['SCRIPT_NAME'];
    $script_dirs = explode('/', trim($script_name, '/'));
    $base_path = '';
    // Find the root directory (the one with index.php, includes, admin, etc.)
    // We'll go up until we find a directory that has 'uploads' or 'includes'
    $current_dir = __DIR__;
    $root_dir = dirname($current_dir); // __DIR__ is includes/, so root is parent
    // Now calculate the path from document root to root_dir
    $doc_root = $_SERVER['DOCUMENT_ROOT'];
    $relative_path = str_replace(realpath($doc_root), '', realpath($root_dir));
    $relative_path = str_replace('\\', '/', $relative_path);
    $relative_path = rtrim($relative_path, '/');
    define('SITE_URL', $protocol . $host . $relative_path);
}

define('SITE_NAME', 'Yono Game Downloads');
define('SITE_TAGLINE', 'Discover & Download Premium Gaming Apps');
define('SITE_DESCRIPTION', 'Yono Game Downloads is your trusted source for discovering and downloading the latest gaming apps. Explore our curated collection of games with detailed reviews and secure downloads.');
define('SITE_LOGO', SITE_URL . '/assets/images/logo3.png');
define('TELEGRAM_LINK', 'https://t.me/your_telegram_channel');
define('SITE_FAVICON', SITE_URL . '/assets/images/fav_icon.png');
define('OG_IMAGE', SITE_URL . '/assets/images/logo3.png');
define('TWITTER_HANDLE', '@yonogamedownloads');
?>