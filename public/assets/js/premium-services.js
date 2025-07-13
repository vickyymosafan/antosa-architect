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
            const isFeatured = card.querySelector('[class*="min-h-[400px]"]') !== null;
            const iconContainer = card.querySelector('[class*="w-16"], [class*="w-20"], [class*="w-24"]');
            const gradientOverlay = card.querySelector('[class*="bg-gradient-to-br"]');

            // Optimized hover effects with cached elements
            card.addEventListener('mouseenter', () => {
                if (iconContainer) {
                    iconContainer.style.transform = isFeatured ? 'scale(1.05)' : 'scale(1.03)';
                    iconContainer.style.transition = 'transform 0.3s ease';
                }

                if (gradientOverlay && isFeatured) {
                    gradientOverlay.style.opacity = '0.05';
                    gradientOverlay.style.transition = 'opacity 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', () => {
                if (iconContainer) iconContainer.style.transform = 'scale(1)';
                if (gradientOverlay) gradientOverlay.style.opacity = '';
            });

            // Enhanced staggered entrance timing
            const aosTrigger = card.closest('[data-aos]');
            if (aosTrigger) {
                aosTrigger.setAttribute('data-aos-delay', 100 + (index * 150));
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
