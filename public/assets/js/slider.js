// assets/js/slider.js - Hero Slider/Carousel Component
console.log('slider.js loaded');

document.addEventListener('DOMContentLoaded', () => {
    // --- Enhanced Configuration ---
    const AUTOPLAY_ENABLED = true;
    const AUTOPLAY_INTERVAL_MS = 8000; // Slightly longer for better UX
    const KEYBOARD_NAVIGATION_ENABLED = true;
    const PAUSE_AUTOPLAY_ON_HOVER = true;
    const PAUSE_AUTOPLAY_ON_FOCUS = true;
    const PAUSE_AUTOPLAY_ON_VISIBILITY_CHANGE = true; // Pause when tab is not visible
    const PREFERS_REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // --- Element Selection ---
    const sliderContainer = document.getElementById('hero-slider');
    const prevButton = document.getElementById('hero-prev');
    const nextButton = document.getElementById('hero-next');
    const paginationElement = document.getElementById('hero-pagination');

    // --- Initial Checks ---
    if (!sliderContainer) {
        console.warn('Hero slider container (hero-slider) not found. Slider cannot initialize.');
        return;
    }
    const slides = Array.from(sliderContainer.children).filter(child => child.classList.contains('hero-slide'));
    if (!slides.length) {
        console.warn('No slides with class .hero-slide found. Slider cannot operate.');
        return;
    }

    // --- State Variables ---
    let currentSlideIndex = 0;
    const totalSlides = slides.length;
    let autoPlayIntervalId = null;
    let isAutoplayPausedByHover = false;
    let isAutoplayPausedByFocus = false;

    // --- Core UI Update Functions ---

    /**
     * Updates the visual state of all slides with enhanced animations and accessibility.
     */
    function updateSlidesUI() {
        slides.forEach((slide, index) => {
            const isActive = index === currentSlideIndex;

            // Enhanced visual transitions
            slide.style.opacity = isActive ? '1' : '0';
            slide.style.zIndex = isActive ? '10' : '0';
            slide.style.transform = isActive ? 'scale(1)' : 'scale(1.05)';

            // Accessibility improvements
            slide.setAttribute('aria-hidden', String(!isActive));
            slide.style.pointerEvents = isActive ? 'auto' : 'none';

            // Add/remove active class for CSS animations
            if (isActive) {
                slide.classList.add('active');
                slide.classList.remove('inactive');
            } else {
                slide.classList.add('inactive');
                slide.classList.remove('active');
            }
        });

        // Announce slide change to screen readers
        if (paginationElement) {
            paginationElement.setAttribute('aria-live', 'polite');
        }
    }

    /**
     * Updates the pagination display to show current slide number.
     */
    function updatePaginationDisplay() {
        if (paginationElement) {
            const currentSlideNumber = String(currentSlideIndex + 1).padStart(2, '0');
            const totalSlidesNumber = String(totalSlides).padStart(2, '0');
            paginationElement.textContent = `${currentSlideNumber} / ${totalSlidesNumber}`;
        }
    }

    /**
     * Enables or disables navigation buttons based on whether there's more than one slide.
     */
    function updateNavButtonStates() {
        const disableButtons = totalSlides <= 1;
        if (prevButton) prevButton.disabled = disableButtons;
        if (nextButton) nextButton.disabled = disableButtons;
    }

    // --- Autoplay Management ---

    /**
     * Stops the autoplay interval.
     */
    function stopAutoplay() {
        if (autoPlayIntervalId) {
            clearInterval(autoPlayIntervalId);
            autoPlayIntervalId = null;
        }
    }

    /**
     * Starts the autoplay interval if conditions are met.
     */
    function startAutoplay() {
        stopAutoplay(); // Clear any existing interval
        if (AUTOPLAY_ENABLED && totalSlides > 1 && !isAutoplayPausedByHover && !isAutoplayPausedByFocus) {
            autoPlayIntervalId = setInterval(() => goToSlide((currentSlideIndex + 1) % totalSlides, true), AUTOPLAY_INTERVAL_MS);
        }
    }

    // --- Slide Navigation ---

    /**
     * Transitions to a specific slide index.
     * @param {number} newIndex - The index of the slide to navigate to.
     * @param {boolean} [triggeredByAutoplay=false] - True if the navigation was triggered by autoplay.
     */
    function goToSlide(newIndex, triggeredByAutoplay = false) {
        if (totalSlides <= 1 || newIndex < 0 || newIndex >= totalSlides) return;

        currentSlideIndex = newIndex;
        updateSlidesUI();
        updatePaginationDisplay();
        // Nav button states are typically set once at init, but could be updated here if logic changes.

        if (!triggeredByAutoplay) {
            startAutoplay(); // Reset timer if user initiated
        }
    }

    /**
     * Shows the next slide.
     * @param {boolean} [triggeredByAutoplay=false] - True if called by autoplay.
     */
    function showNextSlide(triggeredByAutoplay = false) {
        goToSlide((currentSlideIndex + 1) % totalSlides, triggeredByAutoplay);
    }
    
    /**
     * Shows the previous slide. (Always user-initiated for autoplay reset)
     */
    function showPrevSlide() {
        goToSlide((currentSlideIndex - 1 + totalSlides) % totalSlides, false);
    }


    // --- Event Listener Initialization ---

    /**
     * Initializes click listeners for navigation buttons.
     */
    function initializeNavigationControls() {
        if (nextButton) {
            nextButton.addEventListener('click', () => showNextSlide());
        }
        if (prevButton) {
            prevButton.addEventListener('click', showPrevSlide);
        }
    }

    /**
     * Initializes listeners for pausing autoplay on hover and focus.
     */
    function initializeAutoplayPauseBehavior() {
        if (!AUTOPLAY_ENABLED || totalSlides <= 1) return;

        if (PAUSE_AUTOPLAY_ON_HOVER) {
            sliderContainer.addEventListener('mouseenter', () => {
                isAutoplayPausedByHover = true;
                stopAutoplay();
            });
            sliderContainer.addEventListener('mouseleave', () => {
                isAutoplayPausedByHover = false;
                startAutoplay();
            });
        }

        if (PAUSE_AUTOPLAY_ON_FOCUS) {
            const focusableElementsForPause = [sliderContainer, prevButton, nextButton].filter(el => el);
            focusableElementsForPause.forEach(el => {
                el.addEventListener('focusin', () => { // focusin bubbles
                    isAutoplayPausedByFocus = true;
                    stopAutoplay();
                });
                el.addEventListener('focusout', () => { // focusout bubbles
                    isAutoplayPausedByFocus = false;
                    startAutoplay();
                });
            });
        }
    }

    /**
     * Initializes keyboard navigation (ArrowLeft, ArrowRight).
     */
    function initializeKeyboardNavigation() {
        if (!KEYBOARD_NAVIGATION_ENABLED || totalSlides <= 1) return;

        // Make slider container focusable if it's a generic element like DIV/SECTION
        if (sliderContainer.tagName === 'DIV' || sliderContainer.tagName === 'SECTION') {
            sliderContainer.setAttribute('tabindex', '0');
            // Optional: sliderContainer.style.outline = 'none'; // If default outline is undesirable
        }

        sliderContainer.addEventListener('keydown', (event) => {
            // Respond only if the slider container itself has focus.
            // This simplifies the check compared to also checking children.
            // If nav buttons are outside, they won't trigger this, which is fine.
            if (document.activeElement !== sliderContainer) {
                return;
            }

            let handled = false;
            if (event.key === 'ArrowLeft') {
                showPrevSlide();
                handled = true;
            } else if (event.key === 'ArrowRight') {
                showNextSlide(); // Default is user-initiated for autoplay reset
                handled = true;
            }

            if (handled) {
                event.preventDefault(); // Prevent page scrolling if an arrow key was handled
            }
        });
    }

    /**
     * Initializes visibility change detection for better performance
     */
    function initializeVisibilityChangeHandler() {
        if (!PAUSE_AUTOPLAY_ON_VISIBILITY_CHANGE) return;

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoplay();
            } else {
                startAutoplay();
            }
        });
    }

    /**
     * Respects user's motion preferences
     */
    function respectMotionPreferences() {
        if (PREFERS_REDUCED_MOTION) {
            // Disable autoplay for users who prefer reduced motion
            console.info('Autoplay disabled due to user motion preferences');
            return false;
        }
        return true;
    }

    // --- Enhanced Initialization ---
    function initializeSlider() {
        // Respect accessibility preferences
        if (!respectMotionPreferences()) {
            // Still initialize basic functionality without autoplay
            updateSlidesUI();
            updatePaginationDisplay();
            updateNavButtonStates();
            initializeNavigationControls();
            initializeKeyboardNavigation();
            return;
        }

        updateSlidesUI();
        updatePaginationDisplay();
        updateNavButtonStates();

        initializeNavigationControls();
        initializeAutoplayPauseBehavior();
        initializeKeyboardNavigation();
        initializeVisibilityChangeHandler();

        startAutoplay();

        // --- Console Info for Missing Optional Elements ---
        if (!prevButton) console.info('Hero slider previous button (hero-prev) not found (optional).');
        if (!nextButton) console.info('Hero slider next button (hero-next) not found (optional).');
        if (!paginationElement) console.info('Hero slider pagination element (hero-pagination) not found (optional).');

        console.info('Hero slider initialized successfully with enhanced accessibility features');
    }

    initializeSlider();
});
