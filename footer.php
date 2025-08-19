<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-sections">
            <div class="footer-section">
                <h3>WebStudio Pro</h3>
                <p>Crafting digital experiences that inspire and engage.</p>
            </div>
            
            <div class="footer-section">
                <h3>Services</h3>
                <ul>
                    <li><a href="#services">Web Design</a></li>
                    <li><a href="#services">Development</a></li>
                    <li><a href="#services">E-Commerce</a></li>
                    <li><a href="#services">Consulting</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Kontakt</h3>
                <p>E-Mail: <?php echo esc_html(get_theme_mod('contact_email', 'hello@webstudio-pro.de')); ?></p>
                <p>Düsseldorf, Deutschland</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="social-links">
                <a href="#" aria-label="E-Mail">📧</a>
                <a href="#" aria-label="LinkedIn">💼</a>
                <a href="#" aria-label="GitHub">🔗</a>
                <a href="#" aria-label="Instagram">📱</a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Crafted with passion in Düsseldorf.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
// Initialize animations when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    if (typeof WebStudioAnimations !== 'undefined') {
        new WebStudioAnimations();
    }
    
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileOverlay = document.getElementById('mobile-menu-overlay');
    
    if (mobileToggle && mobileOverlay) {
        mobileToggle.addEventListener('click', function() {
            mobileOverlay.classList.toggle('active');
            document.body.classList.toggle('mobile-menu-open');
        });
        
        mobileOverlay.addEventListener('click', function(e) {
            if (e.target === mobileOverlay) {
                mobileOverlay.classList.remove('active');
                document.body.classList.remove('mobile-menu-open');
            }
        });
    }
});
</script>

</body>
</html>