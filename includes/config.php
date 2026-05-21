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
define('SITE_LOGO', SITE_URL . '/assets/images/logo3.png');
define('TELEGRAM_LINK', 'https://t.me/your_telegram_channel');
?>