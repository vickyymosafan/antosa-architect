/**
 * Premium Services Grid Animation System
 * Advanced animations and interactions for the services section
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize premium services animations
    initPremiumServicesAnimations();
    
    function initPremiumServicesAnimations() {
        const servicesSection = document.getElementById('services');
        if (!servicesSection) return;
        
        // Staggered entrance animations
        const serviceCards = servicesSection.querySelectorAll('[style*="transition-delay"]');
        
        // Intersection Observer for entrance animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const entranceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    
                    // Add premium floating animation after entrance
                    setTimeout(() => {
                        entry.target.classList.add('animate-service-float');
                    }, 1000);
                    
                    entranceObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe all service cards
        serviceCards.forEach(card => {
            entranceObserver.observe(card);
        });
        
        // Premium hover interactions
        initPremiumHoverEffects();
        
        // Dynamic background patterns
        initDynamicPatterns();
        
        // Advanced CTA interactions
        initAdvancedCTAEffects();
    }
    
    function initPremiumHoverEffects() {
        const serviceCards = document.querySelectorAll('#services .group');
        
        serviceCards.forEach(card => {
            const iconContainer = card.querySelector('[class*="w-16 h-16"], [class*="w-20 h-20"]');
            const backgroundPattern = card.querySelector('.absolute.inset-0');
            
            card.addEventListener('mouseenter', () => {
                // Subtle icon scale effect
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1.05)';
                }

                // Background pattern animation
                if (backgroundPattern) {
                    backgroundPattern.style.opacity = '0.04';
                    backgroundPattern.style.transform = 'scale(1.02) rotate(1deg)';
                }

                // Subtle patterns animation
                const patterns = card.querySelectorAll('.absolute[class*="border"]');
                patterns.forEach((pattern, index) => {
                    pattern.style.transform = `rotate(${45 + index * 10}deg) scale(${1.05})`;
                });
            });
            
            card.addEventListener('mouseleave', () => {
                // Reset icon
                if (iconContainer) {
                    iconContainer.style.transform = 'scale(1)';
                }

                // Reset background
                if (backgroundPattern) {
                    backgroundPattern.style.opacity = '0.02';
                    backgroundPattern.style.transform = 'scale(1) rotate(0deg)';
                }

                // Reset patterns
                const patterns = card.querySelectorAll('.absolute[class*="border"]');
                patterns.forEach((pattern, index) => {
                    pattern.style.transform = `rotate(${45 + index * 10}deg) scale(1)`;
                });
            });
        });
    }
    
    function initDynamicPatterns() {
        const patterns = document.querySelectorAll('#services .absolute[class*="border"]');
        
        // Subtle continuous animation for patterns
        patterns.forEach((pattern, index) => {
            const animationDelay = index * 0.5;
            const animationDuration = 4 + (index % 3);
            
            pattern.style.animation = `serviceFloat ${animationDuration}s ease-in-out infinite`;
            pattern.style.animationDelay = `${animationDelay}s`;
        });
    }
    
    function initAdvancedCTAEffects() {
        const ctaButtons = document.querySelectorAll('#services .group\\/cta');
        
        ctaButtons.forEach(button => {
            // Ripple effect on click
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
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
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
            
            // Advanced hover states
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.02)';
                this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.3)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
            });
        });
    }
    
    // Performance optimization: Throttle scroll events
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }
    
    // Subtle parallax effect for service cards on scroll (disabled to prevent overlap)
    // Removed to fix layout issues and overlapping cards
});

// Add ripple animation CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .animate-service-float {
        animation: serviceFloat 3s ease-in-out infinite;
    }
    
    .animate-premium-glow {
        animation: premiumGlow 2s ease-in-out infinite;
    }
    
    .animate-icon-rotate {
        animation: iconRotate 0.5s ease-out forwards;
    }
`;
document.head.appendChild(style);
