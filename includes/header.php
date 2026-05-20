<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Download latest Yono games, rummy, teen patti and more'; ?>">
    <?php if (isset($meta_keywords)): ?>
        <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="<?php echo SITE_URL; ?>/" class="logo"><?php echo SITE_LOGO; ?></a>
            <div class="nav-links">
                <a href="<?php echo SITE_URL; ?>/" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['REQUEST_URI']) == '') ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo SITE_URL; ?>/list" class="<?php echo basename($_SERVER['PHP_SELF']) == 'list.php' ? 'active' : ''; ?>">Games</a>
                <a href="<?php echo SITE_URL; ?>/about" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a>
                <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact Us</a>
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
        <a href="<?php echo SITE_URL; ?>/">Home</a>
        <a href="<?php echo SITE_URL; ?>/list">Games</a>
        <a href="<?php echo SITE_URL; ?>/about">About Us</a>
        <a href="<?php echo SITE_URL; ?>/contact">Contact Us</a>
        <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank">Join Telegram</a>
    </div>
    <main>