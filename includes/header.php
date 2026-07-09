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

function getCurrentUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    return $protocol . $host . $uri;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="<?php echo isset($meta_robots) ? $meta_robots : 'index, follow'; ?>">
    <meta name="theme-color" content="#2563eb">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    
    <link rel="icon" href="<?php echo SITE_FAVICON; ?>" type="image/x-icon">
    <link rel="canonical" href="<?php echo isset($canonical_url) ? $canonical_url : getCurrentUrl(); ?>">
    
    <title><?php echo isset($page_title) ? $page_title : SITE_NAME . ' - ' . SITE_TAGLINE; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : SITE_DESCRIPTION; ?>">
    <?php if (isset($meta_keywords)): ?>
        <meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
    <?php endif; ?>
    
    <meta property="og:type" content="<?php echo isset($og_type) ? $og_type : 'website'; ?>">
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : SITE_NAME . ' - ' . SITE_TAGLINE; ?>">
    <meta property="og:description" content="<?php echo isset($meta_description) ? $meta_description : SITE_DESCRIPTION; ?>">
    <meta property="og:url" content="<?php echo isset($canonical_url) ? $canonical_url : getCurrentUrl(); ?>">
    <meta property="og:image" content="<?php echo isset($og_image) ? $og_image : OG_IMAGE; ?>">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo TWITTER_HANDLE; ?>">
    <meta name="twitter:title" content="<?php echo isset($page_title) ? $page_title : SITE_NAME . ' - ' . SITE_TAGLINE; ?>">
    <meta name="twitter:description" content="<?php echo isset($meta_description) ? $meta_description : SITE_DESCRIPTION; ?>">
    <meta name="twitter:image" content="<?php echo isset($og_image) ? $og_image : OG_IMAGE; ?>">
    
    <link rel="preconnect" href="https://coresg-normal.trae.ai">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>",
        "description": "<?php echo SITE_DESCRIPTION; ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo SITE_URL; ?>/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>",
        "logo": "<?php echo SITE_LOGO; ?>",
        "sameAs": [
            "<?php echo TELEGRAM_LINK; ?>"
        ]
    }
    </script>
</head>
<body>
    <header>
        <nav class="navbar" role="navigation" aria-label="Main navigation">
            <div class="container">
                <a href="<?php echo SITE_URL; ?>/" class="logo" aria-label="<?php echo SITE_NAME; ?> Home">
                    <img src="<?php echo SITE_LOGO; ?>" alt="<?php echo SITE_NAME; ?>" style="height: 50px; width: auto;" loading="lazy">
                </a>
                <div class="nav-links">
                    <a href="<?php echo SITE_URL; ?>/" class="<?php echo isActive('index') ? 'active' : ''; ?>" aria-label="Home">Home</a>
                    <a href="<?php echo SITE_URL; ?>/allyonogames" class="<?php echo isActive('allyonogames') ? 'active' : ''; ?>" aria-label="All Yono Games">All Yono Games</a>
                    <a href="<?php echo SITE_URL; ?>/about" class="<?php echo isActive('about') ? 'active' : ''; ?>" aria-label="About Us">About Us</a>
                    <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo isActive('contact') ? 'active' : ''; ?>" aria-label="Contact Us">Contact Us</a>
                    <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank" rel="noopener noreferrer" aria-label="Join Telegram">Join Telegram</a>
                </div>
                <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
        <div class="mobile-menu" id="mobileMenu" role="dialog" aria-label="Mobile navigation">
            <a href="<?php echo SITE_URL; ?>/" class="<?php echo isActive('index') ? 'active' : ''; ?>">Home</a>
            <a href="<?php echo SITE_URL; ?>/allyonogames" class="<?php echo isActive('allyonogames') ? 'active' : ''; ?>">All Yono Games</a>
            <a href="<?php echo SITE_URL; ?>/about" class="<?php echo isActive('about') ? 'active' : ''; ?>">About Us</a>
            <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo isActive('contact') ? 'active' : ''; ?>">Contact Us</a>
            <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank" rel="noopener noreferrer">Join Telegram</a>
        </div>
    </header>
    <main>