// assets/js/main.js

// About animations are now handled by AOS

/**
 * Initializes premium counters with smooth animation effects when they become visible.
 * Supports custom duration, suffix, and easing for each counter.
 * @param {HTMLElement} container - The parent element containing counter elements. Defaults to document.
 */
function initializeCounters(container = document) {
    const counters = container.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const suffix = counter.getAttribute('data-suffix') || '';
        const duration = +counter.getAttribute('data-duration') || 2000;

        // Initialize counter display
        counter.innerText = '0';

        // Animation function with easing
        const animateCounter = (startTime) => {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function for smooth animation (ease-out-cubic)
            const easeOutCubic = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(target * easeOutCubic);

            // Update counter display
            counter.innerText = current;

            // Continue animation if not complete
            if (progress < 1) {
                requestAnimationFrame(() => animateCounter(startTime));
            } else {
                // Ensure final value is exact
                counter.innerText = target;
            }
        };

        // Intersection Observer for triggering animation
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Start animation with current timestamp
                    const startTime = Date.now();
                    requestAnimationFrame(() => animateCounter(startTime));

                    // Unobserve to prevent re-triggering
                    obs.unobserve(counter);
                }
            });
        }, {
            threshold: 0.2, // Start when 20% visible
            rootMargin: '0px 0px -50px 0px' // Trigger slightly before entering viewport
        });

        observer.observe(counter);
    });
}

/**
 * Styles a dock navigation link based on its active state.
 * @param {HTMLElement} link - The dock navigation link element.
 * @param {boolean} isActive - Whether the link should be styled as active.
 */
function styleDockNavLink(link, isActive) {
    if (!link) return;

    const dockIcon = link.querySelector('.dock-icon');
    const svg = link.querySelector('svg');

    if (isActive) {
        // Active state styling
        dockIcon.classList.remove('bg-dark-300/10', 'border-dark-300/20');
        dockIcon.classList.add('bg-primary-400/20', 'border-primary-400/40', 'scale-110');
        svg.classList.remove('text-dark-300');
        svg.classList.add('text-primary-400');
        link.setAttribute('aria-current', 'page');
    } else {
        // Inactive state styling
        if (link.getAttribute('href') !== '#home') {
            dockIcon.classList.remove('bg-primary-400/20', 'border-primary-400/40', 'scale-110');
            dockIcon.classList.add('bg-dark-300/10', 'border-dark-300/20');
            svg.classList.remove('text-primary-400');
            svg.classList.add('text-dark-300');
        }
        link.removeAttribute('aria-current');
    }
}

/**
 * Styles a mobile navigation link based on its active state.
 * @param {HTMLElement} link - The mobile navigation link element.
 * @param {boolean} isActive - Whether the link should be styled as active.
 */
function styleMobileNavLink(link, isActive) {
    if (!link) return;

    const svg = link.querySelector('svg');
    const span = link.querySelector('span');

    if (isActive) {
        link.classList.remove('text-white');
        link.classList.add('text-primary-400');
        link.setAttribute('aria-current', 'page');
    } else {
        if (link.getAttribute('href') === '#home') {
            link.classList.add('text-primary-400');
        } else {
            link.classList.remove('text-primary-400');
            link.classList.add('text-white');
        }
        link.removeAttribute('aria-current');
    }
}

/**
 * Determines the ID of the currently visible section based on scroll position.
 * @param {NodeListOf<HTMLElement>} sections - A list of section elements.
 * @param {number} headerHeight - The height of the header element.
 * @param {number} offset - Additional offset for triggering section change.
 * @returns {string} The ID of the current section, or 'home' by default.
 */
function getCurrentSectionId(sections, headerHeight, offset = 70) {
    let currentSectionId = '';
    const scrollPosition = window.pageYOffset;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (scrollPosition >= (sectionTop - headerHeight - offset)) {
            currentSectionId = section.getAttribute('id');
        }
    });
    
    // Default to 'home' if above the first section or if no section is matched yet
    if (!currentSectionId && sections.length > 0 && scrollPosition < (sections[0].offsetTop - headerHeight - offset)) {
        return 'home';
    }
    
    // If scrolled past the last section, keep the last section active
    if (!currentSectionId && sections.length > 0 && scrollPosition >= (sections[sections.length - 1].offsetTop + sections[sections.length - 1].offsetHeight - headerHeight - offset)) {
        return sections[sections.length - 1].getAttribute('id');
    }

    return currentSectionId || 'home'; // Default to 'home' if no section is active (e.g., very top of page)
}


/**
 * Updates the active state of navigation links based on the current scroll position.
 */
function updateActiveNavLinks() {
    const dockNavLinks = document.querySelectorAll('#dock-nav a.nav-item');
    const mobileNavLinks = document.querySelectorAll('#mobile-menu a.mobile-nav-item');
    const sections = document.querySelectorAll('main section[id]');
    const headerHeight = 80; // Fixed height since we don't have a traditional header

    // Handle homepage root with no sections (e.g. a true single page without scrollable sections)
    if (sections.length === 0 && window.location.pathname === '/' && !window.location.hash) {
        dockNavLinks.forEach(link => styleDockNavLink(link, (link.getAttribute('href') === '#home' || link.getAttribute('href') === '/')));
        mobileNavLinks.forEach(link => styleMobileNavLink(link, (link.getAttribute('href') === '#home' || link.getAttribute('href') === '/')));
        return;
    }

    if (sections.length === 0) return; // No sections to link to

    const currentSectionId = getCurrentSectionId(sections, headerHeight);

    dockNavLinks.forEach(link => {
        styleDockNavLink(link, link.getAttribute('href') === `#${currentSectionId}`);
    });

    mobileNavLinks.forEach(link => {
        styleMobileNavLink(link, link.getAttribute('href') === `#${currentSectionId}`);
    });
}

/**
 * Initializes sticky header behavior.
 * @param {HTMLElement} header - The header element.
 */
// Scroll animations are now handled by AOS


/**
 * Initializes dock magnification effect based on mouse proximity.
 */
function initializeDockMagnification() {
    const dockNav = document.getElementById('dock-nav');
    if (!dockNav) return;

    const dockItems = dockNav.querySelectorAll('.dock-item');

    dockItems.forEach(item => {
        const dockIcon = item.querySelector('.dock-icon');

        item.addEventListener('mouseenter', () => {
            dockIcon.classList.add('scale-125');
            dockIcon.classList.remove('scale-110');
        });

        item.addEventListener('mouseleave', () => {
            dockIcon.classList.remove('scale-125');
            // Only add scale-110 if it's the active item
            if (item.hasAttribute('aria-current')) {
                dockIcon.classList.add('scale-110');
            }
        });
    });

    // Add dock container hover effect
    dockNav.addEventListener('mouseenter', () => {
        dockNav.querySelector('.dock-container').classList.add('scale-105');
    });

    dockNav.addEventListener('mouseleave', () => {
        dockNav.querySelector('.dock-container').classList.remove('scale-105');
    });
}



/**
 * Initializes mobile menu toggle functionality.
 * @param {HTMLButtonElement} button - The mobile menu button.
 * @param {HTMLElement} menu - The mobile menu element.
 */
function initializeMobileMenu(button, menu) {
    if (!button || !menu) return;

    button.addEventListener('click', () => {
        const isHidden = menu.classList.toggle('hidden');
        button.setAttribute('aria-expanded', String(!isHidden));
        menu.classList.remove('animate-fadeIn', 'animate-fadeOut');
        menu.classList.add(isHidden ? 'animate-fadeOut' : 'animate-fadeIn');
    });

    menu.querySelectorAll('a.mobile-nav-item').forEach(link => {
        link.addEventListener('click', () => {
            if (!menu.classList.contains('hidden')) {
                menu.classList.remove('animate-fadeIn');
                menu.classList.add('animate-fadeOut');
                setTimeout(() => menu.classList.add('hidden'), 300); // Match animation duration
                button.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // Ensure menu is hidden by default and aria-expanded is correct
    if (!menu.classList.contains('hidden')) {
        menu.classList.add('hidden');
    }
    button.setAttribute('aria-expanded', 'false');
}

/**
 * Initializes active link highlighting for navigation.
 */
function initializeActiveLinkHighlighting() {
    const hasScrollableSections = document.querySelector('main section[id]');
    const isHomePageRoot = window.location.pathname === '/' && !window.location.hash;

    if (hasScrollableSections || isHomePageRoot) {
        updateActiveNavLinks(); // Initial call
        window.addEventListener('scroll', updateActiveNavLinks);
    }
}


/**
 * Initializes smooth scrolling for anchor links.
 * @param {string} selector - CSS selector for anchor links.
 */
function initializeSmoothScroll(selector = 'a[href^="#"]') {
    document.querySelectorAll(selector).forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const hrefAttribute = this.getAttribute('href');
            // Ensure it's a valid hash link and not just "#"
            if (hrefAttribute && hrefAttribute.length > 1 && hrefAttribute.startsWith('#')) {
                try {
                    const targetElement = document.querySelector(hrefAttribute);
                    if (targetElement) {
                        e.preventDefault();
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                } catch (error) {
                    // Catch invalid selector errors, e.g., if hrefAttribute is not a valid ID
                    console.warn(`Smooth scroll failed for selector: ${hrefAttribute}`, error);
                }
            }
        });
    });
}

// Main DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    initializeDockMagnification();
    initializeMobileMenu(mobileMenuButton, mobileMenu);
    initializeActiveLinkHighlighting();
    initializeSmoothScroll();
    initializeCounters(); // Initialize counters globally or pass a specific container
});
