    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3><?php echo SITE_NAME; ?></h3>
                    <p><?php echo SITE_DESCRIPTION; ?></p>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <a href="<?php echo SITE_URL; ?>/" class="<?php echo isActive('index') ? 'active' : ''; ?>">Home</a>
                    <a href="<?php echo SITE_URL; ?>/allyonogames" class="<?php echo isActive('allyonogames') ? 'active' : ''; ?>">All Yono Games</a>
                    <a href="<?php echo SITE_URL; ?>/about" class="<?php echo isActive('about') ? 'active' : ''; ?>">About Us</a>
                    <a href="<?php echo SITE_URL; ?>/contact" class="<?php echo isActive('contact') ? 'active' : ''; ?>">Contact Us</a>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <a href="<?php echo SITE_URL; ?>/privacy-policy" class="<?php echo isActive('privacy-policy') ? 'active' : ''; ?>">Privacy Policy</a>
                    <a href="<?php echo SITE_URL; ?>/disclaimer" class="<?php echo isActive('disclaimer') ? 'active' : ''; ?>">Disclaimer</a>
                </div>
                <div class="footer-col">
                    <h4>Join Us</h4>
                    <a href="<?php echo TELEGRAM_LINK; ?>" class="btn-telegram" target="_blank" rel="noopener noreferrer">Join Telegram</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <p class="disclaimer">This website is for informational purposes only. We do not host any files. All trademarks belong to their respective owners.</p>
            </div>
        </div>
    </footer>
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top">↑</button>
    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>