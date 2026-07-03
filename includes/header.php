<?php
function isActive($page) {
    $current_script = basename($_SERVER['PHP_SELF'], '.php');
    $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $request_page = basename($request_uri);
    
    if ($page === 'index') {
        return ($current_script === 'index' || $request_page === '' || $request_page === '/');
    }
    
    return ($current_script === $page || $request_page === $page);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo SITE_URL; ?>/assets/images/fav_icon.png" type="image/x-icon">
    <title><?php echo isset($page_title) ? $page_title : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Download latest Yono games, rummy, teen patti and more'; ?>">
    <?php if (isset($meta_keywords)): ?>
        <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="<?php echo SITE_URL; ?>/" class="logo">
                <img src="<?php echo SITE_LOGO; ?>" alt="<?php echo SITE_NAME; ?>" style="height: 50px; width: auto;">
            </a>
            <div class="nav-links">
                <a href="<?php echo SITE_URL; ?>/" class="<?php echo isActive('index') ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo SITE_URL; ?>/yono-games" class="<?php echo isActive('yono-games') ? 'active' : ''; ?>">Games</a>
                <a href="<?php echo SITE_URL; ?>/about" class="<?php echo isActive('about') ? 'active' : ''; ?>">About Us</a>
                <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo isActive('contact') ? 'active' : ''; ?>">Contact Us</a>
                <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank">Join Telegram</a>
            </div>
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
    <div class="mobile-menu" id="mobileMenu">
        <a href="<?php echo SITE_URL; ?>/" class="<?php echo isActive('index') ? 'active' : ''; ?>">Home</a>
        <a href="<?php echo SITE_URL; ?>/yono-games" class="<?php echo isActive('yono-games') ? 'active' : ''; ?>">Games</a>
        <a href="<?php echo SITE_URL; ?>/about" class="<?php echo isActive('about') ? 'active' : ''; ?>">About Us</a>
        <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo isActive('contact') ? 'active' : ''; ?>">Contact Us</a>
        <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank">Join Telegram</a>
    </div>
    <main>