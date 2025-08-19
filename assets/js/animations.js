// WebStudio Pro Animations
class WebStudioAnimations {
    constructor() {
        this.init();
    }
    
    init() {
        this.initCursor();
        this.initScrollAnimations();
        this.initPortfolioScroll();
        this.initParticles();
        this.initNavbar();
        this.initStats();
        this.initServiceCards();
        this.initFormAnimations();
    }
    
    initCursor() {
        if (window.innerWidth <= 768) return; // Skip on mobile
        
        const cursor = document.querySelector('.cursor');
        const cursorFollower = document.querySelector('.cursor-follower');
        
        if (!cursor || !cursorFollower) return;

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            setTimeout(() => {
                cursorFollower.style.left = e.clientX - 10 + 'px';
                cursorFollower.style.top = e.clientY - 10 + 'px';
            }, 100);
        });

        document.addEventListener('mousedown', () => {
            cursor.style.transform = 'scale(0.8)';
            cursorFollower.style.transform = 'scale(0.8)';
        });

        document.addEventListener('mouseup', () => {
            cursor.style.transform = 'scale(1)';
            cursorFollower.style.transform = 'scale(1)';
        });
    }
    
    initScrollAnimations() {
        const revealElements = document.querySelectorAll('.reveal, .reveal-scale');
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('active');
                    }, index * 100);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => {
            revealObserver.observe(el);
        });
    }
    
    initPortfolioScroll() {
        const portfolioTrack = document.getElementById('portfolio-track');
        const portfolioContainer = document.querySelector('.portfolio-container');
        
        if (!portfolioContainer || !portfolioTrack) return;
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const portfolioTop = portfolioContainer.offsetTop;
            const portfolioHeight = portfolioContainer.offsetHeight;
            const windowHeight = window.innerHeight;
            
            if (scrolled > portfolioTop - windowHeight && scrolled < portfolioTop + portfolioHeight) {
                const scrollProgress = (scrolled - (portfolioTop - windowHeight)) / portfolioHeight;
                const maxScroll = portfolioTrack.scrollWidth - window.innerWidth;
                const translateX = -scrollProgress * maxScroll;
                portfolioTrack.style.transform = `translateX(${translateX}px)`;
            }
        });
    }
    
    initParticles() {
        const particlesContainer = document.getElementById('particles');
        if (!particlesContainer) return;
        
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            particlesContainer.appendChild(particle);
        }
    }
    
    initNavbar() {
        let lastScroll = 0;
        const navbar = document.getElementById('navbar');
        
        if (!navbar) return;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll <= 0) {
                navbar.classList.remove('scrolled');
                navbar.classList.remove('hidden');
            } else if (currentScroll > lastScroll && currentScroll > 100) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
                navbar.classList.add('scrolled');
            }
            
            lastScroll = currentScroll;
        });

        // Smooth Scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    initStats() {
        const statObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    entry.target.classList.add('animated');
                    entry.target.classList.add('active');
                    
                    const statNumber = entry.target.querySelector('.stat-number');
                    if (statNumber) {
                        const target = parseInt(statNumber.getAttribute('data-target'));
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            statNumber.textContent = Math.floor(current);
                        }, 16);
                    }
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stat-item').forEach(item => {
            statObserver.observe(item);
        });
    }
    
    initServiceCards() {
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(20px)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
            });
        });
    }
    
    initFormAnimations() {
        // Contact Form 7 Integration
        document.addEventListener('wpcf7mailsent', function(event) {
            // Success animation
            const form = event.target;
            const button = form.querySelector('.wpcf7-submit');
            
            if (button) {
                button.textContent = 'Gesendet! ✓';
                button.style.background = 'var(--success)';
                
                setTimeout(() => {
                    button.textContent = 'Projekt starten';
                    button.style.background = '';
                }, 3000);
            }
        });
        
        // Form field animations
        document.querySelectorAll('.wpcf7-form input, .wpcf7-form textarea').forEach(field => {
            field.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            field.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    }
}

// Text Split Animation for Hero
function initTextSplit() {
    const heroH1 = document.querySelector('.hero h1');
    if (heroH1) {
        const text = heroH1.innerHTML;
        heroH1.innerHTML = text.split('').map((char, index) => {
            if (char === ' ') return ' ';
            return `<span style="animation-delay: ${index * 0.05}s">${char}</span>`;
        }).join('');
    }
}

// Parallax Effect on Mouse Move
function initParallaxMouse() {
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.floating-card');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        cards.forEach((card, index) => {
            const speed = (index + 1) * 10;
            const xOffset = (x - 0.5) * speed;
            const yOffset = (y - 0.5) * speed;
            card.style.transform = `translate(${xOffset}px, ${yOffset}px) rotateX(${yOffset}deg) rotateY(${xOffset}deg)`;
        });
    });
}

// Initialize everything when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize main animations class
    window.webstudioAnimations = new WebStudioAnimations();
    
    // Initialize additional features
    initTextSplit();
    initParallaxMouse();
});

// Loader animation
window.addEventListener('load', () => {
    const loader = document.getElementById('loader');
    if (loader) {
        setTimeout(() => {
            loader.classList.add('hidden');
        }, 1000);
    }
});