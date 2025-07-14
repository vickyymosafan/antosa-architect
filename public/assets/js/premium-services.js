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
            // Get card elements for consistent animations - updated for new icon size
            const iconContainer = card.querySelector('[class*="w-16"]');
            const gradientOverlay = card.querySelector('[class*="bg-gradient-to-br"]');
            const imageOverlay = card.querySelector('[class*="bg-gradient-to-b"]');

            // Enhanced consistent hover effects for all cards
            card.addEventListener('mouseenter', () => {
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1.1)';
                    iconContainer.style.transition = 'all 0.3s ease';
                }

                // Apply subtle gradient effect to all cards
                if (gradientOverlay) {
                    gradientOverlay.style.opacity = '0.04';
                    gradientOverlay.style.transition = 'opacity 0.3s ease';
                }

                // Enhance image overlay on hover
                if (imageOverlay) {
                    imageOverlay.style.background = 'linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.6), rgba(0,0,0,0.9))';
                    imageOverlay.style.transition = 'background 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', () => {
                if (iconContainer) iconContainer.style.transform = 'scale(1)';
                if (gradientOverlay) gradientOverlay.style.opacity = '';
                if (imageOverlay) imageOverlay.style.background = '';
            });

            // Optimized staggered entrance timing
            const aosTrigger = card.closest('[data-aos]');
            if (aosTrigger) {
                aosTrigger.setAttribute('data-aos-delay', 100 + (index * 120));
            }
        });
    }
});

// Enhanced CSS for consistent service card styling
const style = document.createElement('style');
style.textContent = `
    /* Ensure consistent border visibility across all service cards */
    .group .border-t-2 {
        border-top: 2px solid rgba(75, 85, 99, 0.6) !important;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.05);
    }

    /* Enhanced hover effects for service cards */
    .group:hover .border-t-2 {
        border-color: rgba(96, 165, 250, 0.4) !important;
        transition: border-color 0.3s ease;
    }

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
