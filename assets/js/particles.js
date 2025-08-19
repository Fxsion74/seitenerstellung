// Advanced Particle System for WebStudio Pro
class ParticleSystem {
    constructor(container, options = {}) {
        this.container = container;
        this.particles = [];
        this.options = {
            count: options.count || 50,
            color: options.color || '#6366f1',
            size: options.size || 4,
            speed: options.speed || 1,
            ...options
        };
        
        this.init();
    }
    
    init() {
        this.createParticles();
        this.animate();
    }
    
    createParticles() {
        for (let i = 0; i < this.options.count; i++) {
            const particle = {
                x: Math.random() * this.container.clientWidth,
                y: Math.random() * this.container.clientHeight,
                vx: (Math.random() - 0.5) * this.options.speed,
                vy: (Math.random() - 0.5) * this.options.speed,
                life: Math.random(),
                decay: Math.random() * 0.02 + 0.005,
                size: Math.random() * this.options.size + 1
            };
            
            const element = document.createElement('div');
            element.className = 'particle';
            element.style.cssText = `
                position: absolute;
                width: ${particle.size}px;
                height: ${particle.size}px;
                background: ${this.options.color};
                border-radius: 50%;
                pointer-events: none;
                left: ${particle.x}px;
                top: ${particle.y}px;
                opacity: ${particle.life};
            `;
            
            particle.element = element;
            this.container.appendChild(element);
            this.particles.push(particle);
        }
    }
    
    animate() {
        this.particles.forEach(particle => {
            particle.x += particle.vx;
            particle.y += particle.vy;
            particle.life -= particle.decay;
            
            // Wrap around screen
            if (particle.x < 0) particle.x = this.container.clientWidth;
            if (particle.x > this.container.clientWidth) particle.x = 0;
            if (particle.y < 0) particle.y = this.container.clientHeight;
            if (particle.y > this.container.clientHeight) particle.y = 0;
            
            // Reset particle if it dies
            if (particle.life <= 0) {
                particle.life = 1;
                particle.x = Math.random() * this.container.clientWidth;
                particle.y = Math.random() * this.container.clientHeight;
            }
            
            // Update DOM element
            particle.element.style.left = particle.x + 'px';
            particle.element.style.top = particle.y + 'px';
            particle.element.style.opacity = particle.life;
        });
        
        requestAnimationFrame(() => this.animate());
    }
}

// Initialize particle systems
document.addEventListener('DOMContentLoaded', function() {
    // Hero particles
    const heroParticles = document.getElementById('particles');
    if (heroParticles) {
        new ParticleSystem(heroParticles, {
            count: 30,
            color: '#818cf8',
            size: 3,
            speed: 0.5
        });
    }
    
    // Error page particles
    const errorParticles = document.getElementById('error-particles');
    if (errorParticles) {
        new ParticleSystem(errorParticles, {
            count: 15,
            color: '#6366f1',
            size: 2,
            speed: 0.8
        });
    }
});