    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3><?php echo SITE_LOGO; ?></h3>
                    <p>Download latest <?php echo SITE_NAME; ?> and premium gaming apps</p>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                <a href="<?php echo SITE_URL; ?>/" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['REQUEST_URI']) == '') ? 'active' : ''; ?>">Home</a>
                <a href="<?php echo SITE_URL; ?>/list" class="<?php echo basename($_SERVER['PHP_SELF']) == 'list.php' ? 'active' : ''; ?>">Games</a>
                <a href="<?php echo SITE_URL; ?>/about" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a>
                <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact Us</a>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <a href="<?php echo SITE_URL; ?>/privacy-policy">Privacy Policy</a>
                    <a href="<?php echo SITE_URL; ?>/disclaimer">Disclaimer</a>
                </div>
                <div class="footer-col">
                    <h4>Join Us</h4>
                    <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank">Join Telegram</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_LOGO; ?>. All rights reserved.</p>
                <p class="disclaimer">This website is for informational purposes only. We do not host any files.</p>
            </div>
        </div>
    </footer>
    <button class="scroll-top" id="scrollTop">↑</button>
    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>