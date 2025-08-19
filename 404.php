<?php get_header(); ?>

<main class="main-content error-404">
    <div class="container">
        <section class="error-content">
            <div class="error-animation">
                <div class="error-number reveal-scale">404</div>
                <div class="error-particles" id="error-particles"></div>
            </div>
            
            <div class="error-text">
                <h1 class="reveal">Seite nicht gefunden</h1>
                <p class="reveal">Die gesuchte Seite konnte leider nicht gefunden werden. Möglicherweise wurde sie verschoben oder gelöscht.</p>
                
                <div class="error-actions reveal">
                    <a href="<?php echo home_url(); ?>" class="btn-primary">Zur Startseite</a>
                    <a href="javascript:history.back()" class="btn-secondary">Zurück</a>
                </div>
                
                <div class="search-form reveal">
                    <h3>Suchen Sie nach etwas Bestimmtem?</h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>
    </div>
</main>

<style>
.error-404 {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--dark) 0%, #1a1a2e 100%);
    color: white;
}

.error-content {
    text-align: center;
    max-width: 600px;
}

.error-animation {
    position: relative;
    margin-bottom: 3rem;
}

.error-number {
    font-size: 8rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 2rem;
    letter-spacing: -5px;
}

.error-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.error-text h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: white;
}

.error-text p {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.8);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    padding: 1rem 2rem;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
}

.btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.1);
    border-color: rgba(255,255,255,0.6);
}

.search-form {
    background: rgba(255,255,255,0.1);
    padding: 2rem;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.search-form h3 {
    margin-bottom: 1rem;
    color: white;
}

.search-form input[type="search"] {
    width: 100%;
    padding: 1rem;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 10px;
    background: rgba(255,255,255,0.1);
    color: white;
    font-size: 1rem;
}

.search-form input[type="search"]::placeholder {
    color: rgba(255,255,255,0.6);
}

@media (max-width: 768px) {
    .error-number {
        font-size: 5rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
// 404 Page Particle Animation
document.addEventListener('DOMContentLoaded', function() {
    const errorParticles = document.getElementById('error-particles');
    if (errorParticles) {
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = '4px';
            particle.style.height = '4px';
            particle.style.background = 'var(--primary)';
            particle.style.borderRadius = '50%';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 3 + 's';
            particle.style.animation = 'float-particle 3s infinite ease-in-out';
            errorParticles.appendChild(particle);
        }
    }
});
</script>

<?php get_footer(); ?>