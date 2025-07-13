/**
 * Optimized Bento Grid Services Animation System
 * Performance-focused animations with reduced redundancy
 */

document.addEventListener('DOMContentLoaded', function() {
    const servicesSection = document.getElementById('services');
    if (!servicesSection) return;

    // Initialize all services animations
    initServicesAnimations();

    function initServicesAnimations() {
        const serviceCards = servicesSection.querySelectorAll('.group');

        serviceCards.forEach((card, index) => {
            // Get card elements for consistent animations
            const iconContainer = card.querySelector('[class*="w-16"], [class*="w-18"], [class*="w-20"]');
            const gradientOverlay = card.querySelector('[class*="bg-gradient-to-br"]');

            // Consistent hover effects for all cards
            card.addEventListener('mouseenter', () => {
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1.1)';
                    iconContainer.style.transition = 'transform 0.3s ease';
                }

                // Apply subtle gradient effect to all cards
                if (gradientOverlay) {
                    gradientOverlay.style.opacity = '0.04';
                    gradientOverlay.style.transition = 'opacity 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', () => {
                if (iconContainer) iconContainer.style.transform = 'scale(1)';
                if (gradientOverlay) gradientOverlay.style.opacity = '';
            });

            // Optimized staggered entrance timing
            const aosTrigger = card.closest('[data-aos]');
            if (aosTrigger) {
                aosTrigger.setAttribute('data-aos-delay', 100 + (index * 120));
            }
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
