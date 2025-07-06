/**
 * Optimized Services Animation System
 * Subtle and performance-focused animations for the services section
 */

document.addEventListener('DOMContentLoaded', function() {

    // Initialize optimized services animations
    initOptimizedServicesAnimations();

    function initOptimizedServicesAnimations() {
        const servicesSection = document.getElementById('services');
        if (!servicesSection) return;

        // Simple entrance animations
        const serviceCards = servicesSection.querySelectorAll('[style*="transition-delay"]');

        // Intersection Observer for entrance animations only
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -30px 0px'
        };

        const entranceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entranceObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all service cards
        serviceCards.forEach(card => {
            entranceObserver.observe(card);
        });

        // Simple hover interactions only
        initSubtleHoverEffects();
    }
    
    function initSubtleHoverEffects() {
        const serviceCards = document.querySelectorAll('#services .group');

        serviceCards.forEach(card => {
            // Only essential hover effects - no redundant animations
            card.addEventListener('mouseenter', () => {
                // Simple icon scale - no rotation
                const iconContainer = card.querySelector('[class*="w-16 h-16"], [class*="w-18 h-18"]');
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1.03)';
                    iconContainer.style.transition = 'transform 0.2s ease';
                }
            });

            card.addEventListener('mouseleave', () => {
                // Reset icon
                const iconContainer = card.querySelector('[class*="w-16 h-16"], [class*="w-18 h-18"]');
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1)';
                }
            });
        });
    }
    
});

// Minimal CSS for essential animations only
const style = document.createElement('style');
style.textContent = `
    /* Respect user motion preferences */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
`;
document.head.appendChild(style);
