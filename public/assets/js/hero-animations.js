/**
 * Hero Section Premium Animations
 * Provides smooth, staggered entrance animations for hero elements
 * with accessibility support and 60fps performance optimization
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('Hero animations module loaded');

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    // Animation configuration
    const ANIMATION_CONFIG = {
        // Base delays in milliseconds
        titleDelay: prefersReducedMotion ? 0 : 200,
        titleLine1Delay: prefersReducedMotion ? 0 : 400,
        titleLine2Delay: prefersReducedMotion ? 0 : 600,
        subtitleDelay: prefersReducedMotion ? 0 : 800,
        ctaButtonsDelay: prefersReducedMotion ? 0 : 1000,
        ctaPrimaryDelay: prefersReducedMotion ? 0 : 1200,
        ctaSecondaryDelay: prefersReducedMotion ? 0 : 1400,
        
        // Animation durations (reduced for accessibility)
        duration: prefersReducedMotion ? 200 : 700,
        fastDuration: prefersReducedMotion ? 100 : 400,
        
        // Easing
        easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)', // easeOutQuad
    };

    /**
     * Animates an element with smooth entrance effect
     * @param {HTMLElement} element - Element to animate
     * @param {number} delay - Delay before animation starts
     * @param {number} duration - Animation duration
     */
    function animateElement(element, delay = 0, duration = ANIMATION_CONFIG.duration) {
        if (!element) return;

        // Skip animation if reduced motion is preferred
        if (prefersReducedMotion) {
            element.classList.remove('opacity-0', 'translate-y-8', 'translate-y-6', 'translate-y-4', 'scale-95');
            element.classList.add('opacity-100', 'translate-y-0', 'scale-100');
            return;
        }

        // Use requestAnimationFrame for smooth 60fps animation
        setTimeout(() => {
            requestAnimationFrame(() => {
                // Remove initial hidden state
                element.classList.remove('opacity-0');
                element.classList.add('opacity-100');
                
                // Remove transform classes and add final state
                element.classList.remove('translate-y-8', 'translate-y-6', 'translate-y-4', 'scale-95');
                element.classList.add('translate-y-0', 'scale-100');
                
                // Add a subtle bounce effect for CTA buttons
                if (element.classList.contains('hero-cta-primary') || element.classList.contains('hero-cta-secondary')) {
                    element.style.transform = 'translateY(0) scale(1.02)';
                    setTimeout(() => {
                        element.style.transform = 'translateY(0) scale(1)';
                    }, 150);
                }
            });
        }, delay);
    }

    /**
     * Initializes hero section animations with staggered timing
     */
    function initializeHeroAnimations() {
        // Get hero elements
        const heroTitle = document.querySelector('.hero-title');
        const heroTitleLine1 = document.querySelector('.hero-title-line-1');
        const heroTitleLine2 = document.querySelector('.hero-title-line-2');
        const heroSubtitle = document.querySelector('.hero-subtitle');
        const heroCtaButtons = document.querySelector('.hero-cta-buttons');
        const heroCtaPrimary = document.querySelector('.hero-cta-primary');
        const heroCtaSecondary = document.querySelector('.hero-cta-secondary');

        // Check if we're on a page with hero section
        if (!heroTitle) {
            console.info('Hero section not found, skipping hero animations');
            return;
        }

        console.log('Initializing hero animations with staggered timing');

        // Animate elements with staggered delays
        animateElement(heroTitle, ANIMATION_CONFIG.titleDelay);
        animateElement(heroTitleLine1, ANIMATION_CONFIG.titleLine1Delay, ANIMATION_CONFIG.fastDuration);
        animateElement(heroTitleLine2, ANIMATION_CONFIG.titleLine2Delay, ANIMATION_CONFIG.fastDuration);
        animateElement(heroSubtitle, ANIMATION_CONFIG.subtitleDelay);
        animateElement(heroCtaButtons, ANIMATION_CONFIG.ctaButtonsDelay);
        animateElement(heroCtaPrimary, ANIMATION_CONFIG.ctaPrimaryDelay);
        animateElement(heroCtaSecondary, ANIMATION_CONFIG.ctaSecondaryDelay);

        // Add floating animation to CTA buttons (respecting reduced motion)
        if (!prefersReducedMotion && heroCtaPrimary && heroCtaSecondary) {
            addFloatingAnimation(heroCtaPrimary, 2000);
            addFloatingAnimation(heroCtaSecondary, 2500);
        }
    }

    /**
     * Adds subtle floating animation to elements
     * @param {HTMLElement} element - Element to add floating animation
     * @param {number} duration - Animation cycle duration
     */
    function addFloatingAnimation(element, duration = 2000) {
        if (!element || prefersReducedMotion) return;

        let startTime = null;
        
        function animate(currentTime) {
            if (!startTime) startTime = currentTime;
            
            const elapsed = currentTime - startTime;
            const progress = (elapsed % duration) / duration;
            
            // Create subtle floating effect using sine wave
            const yOffset = Math.sin(progress * Math.PI * 2) * 2; // 2px max movement
            
            element.style.transform = `translateY(${yOffset}px)`;
            
            requestAnimationFrame(animate);
        }
        
        // Start floating animation after initial entrance animation
        setTimeout(() => {
            requestAnimationFrame(animate);
        }, ANIMATION_CONFIG.ctaSecondaryDelay + 500);
    }

    /**
     * Adds hover enhancement animations
     */
    function initializeHoverEnhancements() {
        const ctaButtons = document.querySelectorAll('.hero-cta-primary, .hero-cta-secondary');
        
        ctaButtons.forEach(button => {
            // Enhanced hover effects
            button.addEventListener('mouseenter', () => {
                if (!prefersReducedMotion) {
                    button.style.transform = 'translateY(-2px) scale(1.05)';
                    button.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.3)';
                }
            });
            
            button.addEventListener('mouseleave', () => {
                if (!prefersReducedMotion) {
                    button.style.transform = 'translateY(0) scale(1)';
                    button.style.boxShadow = '';
                }
            });
            
            // Add ripple effect on click
            button.addEventListener('click', (e) => {
                if (prefersReducedMotion) return;
                
                const ripple = document.createElement('span');
                const rect = button.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;
                
                button.style.position = 'relative';
                button.style.overflow = 'hidden';
                button.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    /**
     * Adds CSS keyframes for ripple animation
     */
    function addRippleStyles() {
        if (document.getElementById('hero-ripple-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'hero-ripple-styles';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Initialize all hero animations
    function init() {
        // Add ripple styles
        addRippleStyles();
        
        // Initialize animations with a small delay to ensure DOM is ready
        setTimeout(() => {
            initializeHeroAnimations();
            initializeHoverEnhancements();
        }, 100);
    }

    // Start initialization
    init();

    console.log('Hero animations initialized successfully');
});
