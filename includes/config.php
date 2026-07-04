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
    $script_name = $_SERVER['SCRIPT_NAME'];
    $script_path = dirname($script_name);
    $script_path = rtrim($script_path, '/');
    define('SITE_URL', $protocol . $host . $script_path);
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